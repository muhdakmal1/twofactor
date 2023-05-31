<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKadRequest;
// use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdateKadRequest;
use App\Models\model_cps_template;
use App\Models\model_cps_customer;
use App\Models\model_cps_music;
use App\Permission;
use DateTimeZone;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KadsController extends Controller
{
    /** @var string {@see https://www.php.net/manual/en/function.date.php} */
    protected $dateFormat = 'Ymd';
    /** @var string */
    protected $dateTimeFormat = 'Ymd\THis\Z';

    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = model_cps_customer::where('is_deleted',0)->get();

        return view('admin.kads.index', compact('customers'));
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $music = model_cps_music::all();

        return view('admin.kads.create',compact('music'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();

        $checking_customer = model_cps_customer::find($request->customer_email);

        if(empty($checking_customer)) {
            $arr = explode("@", $request->customer_email, 2);
            $Userid = model_cps_customer::insertGetId([
                'name' => $request->customer_name,
                'email' => $request->customer_email,
                'url' => 'localhost:8000/ekad/'.$arr[0],
                'basic' => 1,
                'advanced' => 0,
                'is_paid' => 0,
                'expired_at' => Carbon::parse($request->date_event)->addYear(1),                                                                                                               
            ]);

            $path = public_path('assets\img\kad');
            $output->writeln($path);
            $imageName = $Userid . '.' . $request->url_img->extension();
            $output->writeln($imageName);
            $request->url_img->move($path, $imageName);

            $fileDestination = '/assets/img/kad/'.$imageName;

            $googleurl = $this->generateGoogle($request);
            $icalendarurl = $this->generateICS($request);

            model_cps_template::create([
                'customer_id' => $Userid,
                'intro_desc' => $request->intro_desc,
                'url_img' => $fileDestination,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'customer_name' => $request->customer_name,
                'couple_name' => $request->couple_name, 
                'location_short' => $request->location_short,
                'date_event' => $request->date_event,
                'time_event1' => $request->time_event1,
                'timedec_event1' => $request->timedec_event1,
                'time_event2' => $request->time_event2,
                'timedec_event2' => $request->timedec_event2,
                'time_event3' => $request->time_event3,
                'timedec_event3' => $request->timedec_event3,
                'contact_person1' => $request->contact_person1,
                'contact_no1' => $request->contact_no1,
                'contact_relation1' => $request->contact_relation1,
                'contact_person2' => $request->contact_person2,
                'contact_no2' => $request->contact_no2,
                'contact_relation2' => $request->contact_relation2,
                'contact_person3' => $request->contact_person3,
                'contact_no3' => $request->contact_no3,
                'contact_relation3' => $request->contact_relation3,
                'contact_person4' => $request->contact_person4,
                'contact_no4' => $request->contact_no4,
                'contact_relation4' => $request->contact_relation4,
                'music_id' => $request->music_id + 1,
                'googlemap_url' => $request->googlemap_url,
                'wazemap_url' => $request->wazemap_url,
                'google_calendar' => $googleurl,
                'apple_calendar' => $icalendarurl,
                'googlemap_link' => $request->googlemap_link,
                'textUcapan' => $request->textUcapan,
                'config_type' => 1
            ]);

            // $output->writeln($request2);
            // $permission = model_cps_template::create($request->all() + ['customer_id' => $Userid, 'config_type' => 1]);
            

            return redirect()->route('admin.kads.index');
        }
        else {
            return redirect()->back()->withErrors('Client Email Already Exist!');
        }
    }

    public function edit($id)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $customer = DB::table('cps_customer')
        // ->leftjoin('cps_template', 'cps_template.customer_id','=','cps_customer.id')
        // ->leftjoin('cps_music', 'cps_music.customer_id', '=', 'cps_customer.id')
        // ->where('cps_customer.id',$id)
        // ->first();

        $customer = model_cps_customer::with('template')->find($id);
        $customer->music_id = $customer->music_id - 1;
        $music = model_cps_music::all();

        return view('admin.kads.edit',compact('customer','music'));
    }

    public function update(Request $request, $id)
    {
        $template = model_cps_template::find($id);

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        
        $googleurl = $this->generateGoogle($request);
        $icalendarurl = $this->generateICS($request);
        // $output->writeln($googleurl);
        // $output->writeln($icalendarurl);

        
        // $output->writeln($template);
        $fileName = $template->url_img;
        $input = $request->all();
        
        // $output->writeln($input);
        $template->fill($input);
        $template->music_id = $request->music_id + 1;
        $template->google_calendar = $googleurl;
        $template->apple_calendar = $icalendarurl;

        if ($request->hasFile('url_img')){
            $path = public_path('assets\img\kad');
            $output->writeln($path);
            $imageName = $template->customer_id . '.' . $request->url_img->extension();
            $output->writeln($imageName);
            $request->url_img->move($path, $imageName);

            $template->url_img = '/assets/img/kad/'.$imageName;
        }
        else {
            $output->writeln($template->url_img);

            $template->url_img = $fileName;
        }

        // if (isset($fileName) && file_exists($fileName)) {
        //     unlink($fileName);
        // }

        $template->save();
        $output->writeln($template->fill($input));

        // $customer->update($customer->all());

        return redirect()->route('admin.kads.index');
    }

    // public function show(Permission $permission)
    // {
    //     abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.permissions.show', compact('permission'));
    // }

    public function destroy(model_cps_customer $customer)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->update(['is_deleted' => 1]);

        return back();
    }

    public function massDestroy(Request $request)
    {
        model_cps_customer::whereIn('id', request('ids'))->update(['is_deleted' => 1]);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function generateGoogle(Request $data): string
    {
        $url = 'https://calendar.google.com/calendar/render?action=TEMPLATE';

        // $utcStartDateTime = (clone $data->date_event)->setTimezone(new DateTimeZone('UTC'));
        // $utcEndDateTime = (clone $data->date_event)->setTimezone(new DateTimeZone('UTC'));
        // $dateTimeFormat = $link->allDay ? $this->dateFormat : $this->dateTimeFormat;

        $sdate = Carbon::parse($data->date_event);
        $edate = Carbon::parse($data->date_event);
        $utcStartDateTime = $sdate->setTimezone(new DateTimeZone('UTC'));
        $utcEndDateTime = $edate->setTimezone(new DateTimeZone('UTC'));
        $dateTimeFormat = $this->dateFormat;
        $url .= '&dates='.$utcStartDateTime->format($dateTimeFormat).'/'.$utcEndDateTime->format($dateTimeFormat);

        // Add timezone name if it is specified in both from and to dates and is the same for both
        if (
            $sdate->getTimezone() && $edate->getTimezone()
            && $sdate->getTimezone()->getName() === $edate->getTimezone()->getName()
        ) {
            $url .= '&ctz=' . $sdate->getTimezone()->getName();
        }

        $title = "Walimatulurus ".$data->customer_name." dan ".$data->couple_name;
        $url .= '&text='.urlencode($title);

        if ($data->intro_desc) {
            $url .= '&details='.urlencode($data->intro_desc);
        }

        if ($data->location_short) {
            $url .= '&location='.urlencode($data->location_short);
        }

        $url .= '&sf=true&output=xml';

        return $url;
    }

    public function generateICS(Request $data): string
    {
        $title = "Walimatulurus ".$data->customer_name." dan ".$data->couple_name;
        $sdate = Carbon::parse($data->date_event);
        $edate = Carbon::parse($data->date_event);

        $url = [
            'BEGIN:VCALENDAR',
            'VERSION:2.0', // @see https://datatracker.ietf.org/doc/html/rfc5545#section-3.7.4
            'PRODID:Spatie calendar-links', // @see https://datatracker.ietf.org/doc/html/rfc5545#section-3.7.3
            'BEGIN:VEVENT',
            'UID:'.now().'@clickpixeltudio',
            'SUMMARY:'.$this->escapeString($title),
        ];

        $dateTimeFormat = $this->dateFormat;

        // if ($link->allDay) {
            $url[] = 'DTSTAMP:'.gmdate($dateTimeFormat, $sdate->getTimestamp());
            $url[] = 'DTSTART:'.gmdate($dateTimeFormat, $sdate->getTimestamp());
            $url[] = 'DURATION:P'.(max(1, $sdate->diff($edate)->days)).'D';
        // } else {
        //     $url[] = 'DTSTAMP:'.gmdate($dateTimeFormat, $link->from->getTimestamp());
        //     $url[] = 'DTSTART:'.gmdate($dateTimeFormat, $link->from->getTimestamp());
        //     $url[] = 'DTEND:'.gmdate($dateTimeFormat, $link->to->getTimestamp());
        // }

        if ($data->intro_desc) {
            $url[] = 'DESCRIPTION:'.$this->escapeString(strip_tags($data->intro_desc));
        }
        if ($data->location_short) {
            $url[] = 'LOCATION:'.$this->escapeString($data->location_short);
        }

        // if (isset($this->options['URL'])) {
        //     $url[] = 'URL;VALUE=URI:'.$this->options['URL'];
        // }

        $url[] = 'END:VEVENT';
        $url[] = 'END:VCALENDAR';

        return $this->buildLink($url);
    }

    protected function buildLink(array $propertiesAndComponents): string
    {
        return 'data:text/calendar;charset=utf8;base64,'.base64_encode(implode("\r\n", $propertiesAndComponents));
    }

    /** @see https://tools.ietf.org/html/rfc5545.html#section-3.3.11 */
    protected function escapeString(string $field): string
    {
        return addcslashes($field, "\r\n,;");
    }

    /** @see https://tools.ietf.org/html/rfc5545#section-3.8.4.7 */
    // protected function generateEventUid(Link $link): string
    // {
    //     return md5(sprintf(
    //         '%s%s%s%s',
    //         $link->from->format(\DateTimeInterface::ATOM),
    //         $link->to->format(\DateTimeInterface::ATOM),
    //         $link->title,
    //         $link->address
    //     ));
    // }
}
