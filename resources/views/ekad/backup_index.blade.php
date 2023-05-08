<?php
    use Carbon\Carbon;
    use App\Models\model_cps_config;

    $date1 = Carbon::parse($template_data->date_event);
    $date2 = Carbon::parse($template_data->date_event);
    $date3 = Carbon::parse($template_data->date_event);
    $date4 = Carbon::parse($template_data->date_event);
    $date5 = Carbon::parse($template_data->date_event);

    $hari1 = $date1->locale('ms');
    $hari2 = $date2->locale('ms');
    $hari3 = $date3->locale('ms');
    $hari4 = $date4->locale('ms');
    $hari5 = $date5->locale('ms');
    $tarikh = $date1->locale('ms')->translatedFormat('l, j F Y');

    $color_layoutjemputan = model_cps_config::where('customer_id',$user_id)->where('item','color_layoutjemputan')->first();
    $color_layoutPengantin = model_cps_config::where('customer_id',$user_id)->where('item','color_layoutPengantin')->first();
    $color_calendar_icon = model_cps_config::where('customer_id',$user_id)->where('item','color_calendar_icon')->first();
    $color_location_icon = model_cps_config::where('customer_id',$user_id)->where('item','color_location_icon')->first();
    $color_time_icon = model_cps_config::where('customer_id',$user_id)->where('item','color_time_icon')->first();
    $color_day = model_cps_config::where('customer_id',$user_id)->where('item','color_day')->first();
    $color_hour = model_cps_config::where('customer_id',$user_id)->where('item','color_hour')->first();
    $color_minute = model_cps_config::where('customer_id',$user_id)->where('item','color_minute')->first();
    $color_second = model_cps_config::where('customer_id',$user_id)->where('item','color_second')->first();
    $text_countdownItem = model_cps_config::where('customer_id',$user_id)->where('item','text_countdownItem')->first();

    // echo $color_layoutjemputan;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('ekad.components.Header')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:regular,bold,italic|Quicksand|Cookie|Satisfy|Lato|Lobster|Cinzel:medium|Parisienne|Questrial|Marcellus|Tangerine&subset=latin,latin-ext" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        {{-- <script src="https://unpkg.com/scrollreveal"></script> --}}
        <script src="{!! asset('assets/js/core/jquery.min.js')!!}"></script>
        <script src="{!! asset('assets/js/core/scroller.min.js')!!}"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <style>
            @font-face {
                font-family: "AstonScript";
                src: url('/font/AstonScript.ttf') format("truetype");
            }
            .swal-text-custom {
                font-size: 11px !important;
            }
            #datatables thead
            { 
                display: none; 
            }
                #loader {
                border: 12px solid #f3f3f3;
                border-radius: 50%;
                border-top: 12px solid #444444;
                width: 70px;
                height: 70px;
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }
            
            .center {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }

            .splash {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: white;
                z-index: 99;
                text-align: center;
                line-height: 90vh;
            }

            .splash.display-none {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: white;
                z-index: -10;
                text-align: center;
                line-height: 90vh;
                transition: all 0.5s;
            }

            @keyframes fadeIn{
                to{
                    opacity: 1;
                }
            }

            .fade-in {
                opacity: 0;
                animation: fadeIn 1s ease-in forwards;
            }
        </style>
    </head>
    <body>
        {{-- <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div> --}}
        <div class="splash">
            {{-- <h1 class="fade-in">test</h1> --}}
            <img style="width: 200px;" class="fade-in" src="{!! asset('assets/img/logo/cps.jpeg')!!}" alt="kad Logo"/>
        </div>
        <div id="loader" class="center"></div>
        <div>
            <div class="body">
                <div class="weddingcard card-cps">
                    <div id="particles-js"></div>
                    <div style="position:relative;">
                    <div class="divOne">
                        <img src="{!! asset($template_data->url_img)!!}" alt="kad Logo" width="100%"/>
                        <div style="position:relative;" data-aos="fade-zoom-in" 
                        data-aos-easing="ease-in-back" 
                        data-aos-delay="300" 
                        data-aos-offset="0" 
                        data-aos-mirror="true"
                        data-aos-once="false">
                            <img src="{!! asset('assets/img/bismillah.png')!!}" alt="bismillah Logo" width="60%" style="margin-bottom: -40px;"/>
                            <div>
                                <img src="{!! asset('assets/img/line3.png')!!}" alt="line 3" width="30%"/>
                            </div>
                        </div>
                    </div>
                    <div class="divTwo text-center">
                        <div data-aos="fade-zoom-in" 
                        data-aos-easing="ease-in-back" 
                        data-aos-delay="300" 
                        data-aos-offset="0" 
                        data-aos-mirror="true"
                        data-aos-once="false">
                            <p style="font-family:'Questrial,sans-serif'; font-size:large">
                                Assalamualaikum Warahmatullahi Wabarakatuh
                                <br/>
                                Dengan penuh kesyukuran kami,
                            </p>
                        </div>
                        <div class="layoutJemputan" style="{{ $color_layoutjemputan->css }}">
                            <div data-aos="fade-zoom-in" 
                            data-aos-easing="ease-in-back" 
                            data-aos-delay="300" 
                            data-aos-offset="0" 
                            data-aos-mirror="true"
                            data-aos-once="false">
                            <p>{{ $template_data->father_name }}</p>
                            <p style="font-style:italic">bersama</p>
                            <p>{{ $template_data->mother_name }}</p>
                            </div>
                        </div>
                        <div data-aos="fade-in" 
                            data-aos-easing="ease-in-back" 
                            data-aos-delay="300" 
                            data-aos-offset="0" 
                            data-aos-mirror="true"
                            data-aos-once="false">
                            <p>
                                Menjemput Dato'/Datin/Tuan/Puan/Encik/Cik
                                <br/>
                                Ke Majlis Perkahwinan Anakanda Kami
                            </p>
                        </div>
                        <div class="layoutPengantin customfont" style="{{ $color_layoutPengantin->css }} font-family: AstonScript;">
                            <div data-aos="zoom-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <p>{{ $template_data->customer_name }}</p>
                                <p>dengan pasangannya</p>
                                <p>{{ $template_data->couple_name }}</p>
                            </div>
                        </div>
                        <div data-aos="fade-in" 
                            data-aos-easing="ease-in-back" 
                            data-aos-delay="300" 
                            data-aos-offset="0" 
                            data-aos-mirror="true"
                            data-aos-once="false">
                            <div style="padding:0px 0px 20px 0px;">
                                <img src="{!! asset('assets/img/linelove.png')!!}" alt="line 3" width="50%"/>
                            </div>
                        </div>
                        <div>
                            <div data-aos="zoom-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div style="paddingBottom:10px;">
                                    <div class="elementIcon" style="{{ $color_calendar_icon->css }}">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="white" height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" style="color: white;"><path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div>
                                    <span>{{ $tarikh }}</span>
                                </div>
                            </div>
                            <div data-aos="zoom-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div style="padding-top:10px; padding-bottom:10px">
                                    <div class="elementIcon" style="{{ $color_location_icon->css }}">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" color="white" height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" style="color: white;"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="fade-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div>
                                    <p>{{ $template_data->location_short }}</p>
                                </div>
                            </div>
                            <div data-aos="zoom-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div style="padding-bottom:10px">
                                    <div class="elementIcon" style="{{ $color_time_icon->css }}">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" color="white" height="30px" width="30px" xmlns="http://www.w3.org/2000/svg" style="color: white;"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm1-10V7h-2v7h6v-2h-4z"></path></g></svg>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="zoom-in" 
                                data-aos-easing="ease-in-back" 
                                data-aos-delay="300" 
                                data-aos-offset="0" 
                                data-aos-mirror="true"
                                data-aos-once="false">
                                <div style="padding-bottom:20px">
                                    <span>{{ $template_data->time_event1 }} - {{ $template_data->time_event3 }}</span>
                                    <br />
                                </div>
                            </div>
                            {{-- <Aturcara /> --}}
                            <div class="custom-aturcara">
                                <div class="row-cps">
                                    <div class="col-cps col-sm-12 div1-aturcara">
                                        <div class="text-left">
                                            <table width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="head-aturcara">
                                                            <p class="titleStyle">Aturcara</p>
                                                            <table class="table-aturcara" width="100%" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-right" width="45%">{{ $template_data->time_event1 }}</td>
                                                                        <td>-</td>
                                                                        <td class="text-left" width="45%">{{ $template_data->timedec_event1 }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="masa-acara">{{ $template_data->time_event2 }}</td>
                                                                        <td style="width:30px;">-</td>
                                                                        <td class="text-left">{{ $template_data->timedec_event2 }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="masa-acara">{{ $template_data->time_event3 }}</td>
                                                                        <td style="width:30px;">-</td>
                                                                        <td class="text-left">{{ $template_data->timedec_event3 }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>                           
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <p class="titleStyle">Counting Days</p>
                        <div width="100%" style="display:flex;">
                            {{-- <CountdownV3 timeTillDate="05 22 2022, 11:00 am" timeFormat="MM DD YYYY, h:mm a" /> --}}
                            <div class="counter">
                                <ul style="list-style: none; margin: 0px; padding: 0px; display: table; table-layout: fixed; width: 100%;">
                                    <li style="list-style: none; margin: 0px; padding: 5px; position: relative; display: table-cell;">
                                        <div style="{{ $color_day->css }} color:#fff; border-radius:10px 10px 10px 10px;">
                                        {{-- {days && ( --}}
                                            <div class="countdownItem">
                                                <span class="e-m-days" style="font-size: 40px; {{ $text_countdownItem->css }}"></span>
                                                {{-- <SVGCircle radius={daysRadius} /> --}}
                                                <svg class="countdownSvg"></svg>
                                                {{-- {Math.trunc(days)} --}}
                                                <span style="{{ $text_countdownItem->css }}">days</span>
                                            </div>
                                        {{-- )} --}}
                                        </div>
                                    </li>
                                    <li style="list-style: none; margin: 0px; padding: 5px; position: relative; display: table-cell;">
                                        <div style="{{ $color_hour->css }} color:#fff; border-radius: 10px 10px 10px 10px;">
                                        {{-- {days && ( --}}
                                            <div class="countdownItem">
                                                <span class="e-m-hours" style="font-size: 40px; {{ $text_countdownItem->css }}"></span>
                                                {{-- <SVGCircle radius={daysRadius} /> --}}
                                                <svg class="countdownSvg"></svg>
                                                {{-- {Math.trunc(days)} --}}
                                                <span style="{{ $text_countdownItem->css }}">hours</span>
                                            </div>
                                        {{-- )} --}}
                                        </div>
                                    </li>
                                    <li style="list-style: none; margin: 0px; padding: 5px; position: relative; display: table-cell;">
                                        <div style="{{ $color_minute->css }} color:#fff; border-radius:10px 10px 10px 10px;">
                                        {{-- {days && ( --}}
                                            <div class="countdownItem">
                                                <span class="e-m-minutes" style="font-size: 40px; {{ $text_countdownItem->css }}"></span>
                                                {{-- <SVGCircle radius={daysRadius} /> --}}
                                                <svg class="countdownSvg"></svg>
                                                {{-- {Math.trunc(days)} --}}
                                                <span style="{{ $text_countdownItem->css }}">minutes</span>
                                            </div>
                                        {{-- )} --}}
                                        </div>
                                    </li>
                                    <li style="list-style: none; margin: 0px; padding: 5px; position: relative; display: table-cell;">
                                        <div style="{{ $color_second->css }} color:#fff; border-radius:10px 10px 10px 10px;">
                                        {{-- {days && ( --}}
                                            <div class="countdownItem">
                                                <span class="e-m-seconds" style="font-size: 40px; {{ $text_countdownItem->css }}"></span>
                                                {{-- <SVGCircle radius={daysRadius} /> --}}
                                                <svg class="countdownSvg"></svg>
                                                {{-- {Math.trunc(days)} --}}
                                                <span style="{{ $text_countdownItem->css }}">seconds</span>
                                            </div>
                                        {{-- )} --}}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="divFour text-center">
                        <div>
                            <img src="{!! asset('assets/img/line3.png')!!}" alt="line 3" width="30%"/>
                        </div>
                        <div>
                            <img src="{!! asset('assets/img/bismillah1.png')!!}" alt="bismillah1" width="20%"/>
                        </div>
                        <p>
                            "Ya Allah Yang Maha Mencipta, Jadikanlah majlis ini majlis yang mendapat keberkatan dan keredhaanMu, kekalkanlah ikatan perkahwinan mereka sepanjang hayat, tetapkanlah kasih sayang antara mereka selagi tidak melebihi kasih padaMu..YaAllah, satukan hati kedua mempelai ini seperti Engkau satukan hati Adam dan Hawa, Yusuf dan Zulaikha dan seperti Engkau satukan hati Muhammad s.a.w dan Siti Khadijah agar kekal hingga syurgaMu"
                        </p>
                        <p>Aamin, Ya Rabbal A'lamin ..</p>
                    </div>
                    <div class="divFive text-center">
                        <hr/>
                        <p class="titleStyle">Tinggalkan Ucapan Anda</p>
                        {{-- <FormRSVP data={datas} eventSubmit={this.onSubmit} /> --}}
                        <form id="recipient-form" autocomplete="off" class="av-invalid">
                            @csrf
                            <div class="input-group" style="padding: 8px">
                                <input name="name" placeholder="Nama Anda" required="" id="name" type="text" class="is-touched is-pristine av-invalid is-invalid form-control">
                                <input name="user_id" id="user_id" type="text" hidden value="{{ $user_id }}">
                            </div>
                            <div class="input-group" style="padding: 8px">
                                <textarea name="comment" id="comment" placeholder="Ucapan Anda" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="input-group" style="padding: 8px">
                                <select name="rsvpID" required="" id="rsvpID" class="is-untouched is-pristine av-invalid form-control">
                                    <option value="">- Sahkan Kedatangan -</option>
                                    <option value="1">Hadir</option>
                                    <option value="2">Tidak Hadir</option>
                                    <option value="3">Tidak Pasti</option>
                                </select>
                            </div>
                            <button id="sent" type="submit" class="btn btn-secondary btn-block">Hantar</button>
                        </form>
                        <br/>
                        <hr/>
                        <div>
                            <ul style="padding: 0px; list-style: none;">
                                <li>
                                    <table id="datatables" width="100%" border="0">
                                        <thead>
                                            <tr class="tblBroker_head">
                                                <th>Broker Name </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($post_data as $data)
                                            <tr>
                                                <td style="font-size: 12px">
                                                    <span style="font-style: italic">from</span>&nbsp;
                                                    <span class="namatetamu">
                                                        {{ $data->name_recipient }} ({{ $data->presence_recipient }})
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="commenttetamu">{{ $data->comment_recipient }}</td>
                                            </tr>
                                            <tr>
                                                <td><hr/></td>
                                            </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- navbar --}}
                    <div id="Calendar" btn="features" class="footer1-navbar-cps hidden animate__animated">
                        <div class="Calendar_custom">
                            <span class="thead" style="display:flex; justify-Content:center; align-content:center;">Set Reminder Majlis</span>
                            <p style="text-align:center">
                                <span class="date1">{{ $hari1->subDays(2)->translatedFormat('j') }} </span>
                                <span class="date2">{{ $hari2->subDay()->translatedFormat('j') }} </span>
                                <span class="date3">{{ $hari3->translatedFormat('j') }} </span>
                                <span class="date2">{{ $hari4->addDay()->translatedFormat('j') }} </span>
                                <span class="date1">{{ $hari5->addDays(2)->translatedFormat('j') }} </span>
                            </p>
                            <p style="text-align:center; font-weight:bold">{{ $hari3->translatedFormat('F') }}</p>
                            <p style="text-align:center; font-weight:bold; margin-bottom:30px;">{{ $hari3->translatedFormat('Y') }}</p>
                            <div class="catCalendar">
                                <p style="text-align:center">
                                    <a 
                                    class="textCalendar"
                                        href="{{ $template_data->googlemap_url }}"
                                        {{-- href="https://www.google.com/calendar/render?action=TEMPLATE&text=Walimatulurus%20|%20Akmal%20Dan%20Nori&dates=20210213T120000/20210213T170000&location=Parit%20Bengkok,%20Bagan%20Laut,%2083000,%20Batu%20Pahat,%20Johor,%20Malaysia&sf=true&output=xml" --}}
                                        {{-- href="https://calendar.google.com/event?action=TEMPLATE&tmeid=MjY2c2NpbDN2dHUyOTFhamk0YWJwaXA3cWEgbXVoZGFrbWFsb3RobWFuMEBt&tmsrc=muhdakmalothman0%40gmail.com" --}}
                                        target="_blank"
                                    >
                                        Google Calendar
                                        <span class="saveCalendar">SET</span>
                                    </a>
                                </p>
                                &nbsp;
                                <p style="text-align:center;">
                                    <a 
                                    class="textCalendar"
                                        href="{{asset($template_data->wazemap_url)}}"
                                        target="_blank"
                                    >
                                        Apple Calendar
                                        <span class="saveCalendar">SET</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="Location" class="footer1-navbar-cps hidden animate__animated">
                        <div class="Calendar_custom">
                            <span class="thead" style="display:flex; justify-Content:center; align-content:center;">Dapatkan Arah Majlis</span>
                            <div style="padding:0px 20px">
                                <iframe 
                                    src="{{ $template_data->googlemap_url }}"
                                    {{-- src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.909756077206!2d102.23451231476739!3d5.868309595748312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b699c0283d72b3%3A0x8a92414b4fad1e3c!2sJalan%20Jenereh%20Bongkok%2C%20Kampung%20Gading%20Galoh%2C%2016700%20Pulai%20Chondong%2C%20Kelantan!5e0!3m2!1sen!2smy!4v1607941782619!5m2!1sen!2smy"  --}}
                                    width="100%"
                                    height="300px"
                                    frameBorder="0"
                                    style="border:0; border-radius:15px"
                                    allowfullscreen>
                                </iframe>
                                <div class="catLocation">
                                    <a 
                                        href="{{ $template_data->wazemap_url }}"
                                        {{-- href="https://www.waze.com/en/live-map/directions/my/{{ $template_data->location_short }}?navigate=yes&place=ChIJX6HRnmZU0DER-yMobQK3Cno&q=Dropped%20Pin" --}}
                                        target="_blank"
                                        class="textLocation"
                                        style="border-radius: 0px 15px 0px 10px">
                                        {{-- <FaWaze size='20px' />&nbsp; --}}
                                        {{-- <i class="fa-brands fa-waze"></i> --}}
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="M502.17 201.67C516.69 287.53 471.23 369.59 389 409.8c13 34.1-12.4 70.2-48.32 70.2a51.68 51.68 0 0 1-51.57-49c-6.44.19-64.2 0-76.33-.64A51.69 51.69 0 0 1 159 479.92c-33.86-1.36-57.95-34.84-47-67.92-37.21-13.11-72.54-34.87-99.62-70.8-13-17.28-.48-41.8 20.84-41.8 46.31 0 32.22-54.17 43.15-110.26C94.8 95.2 193.12 32 288.09 32c102.48 0 197.15 70.67 214.08 169.67zM373.51 388.28c42-19.18 81.33-56.71 96.29-102.14 40.48-123.09-64.15-228-181.71-228-83.45 0-170.32 55.42-186.07 136-9.53 48.91 5 131.35-68.75 131.35C58.21 358.6 91.6 378.11 127 389.54c24.66-21.8 63.87-15.47 79.83 14.34 14.22 1 79.19 1.18 87.9.82a51.69 51.69 0 0 1 78.78-16.42zM205.12 187.13c0-34.74 50.84-34.75 50.84 0s-50.84 34.74-50.84 0zm116.57 0c0-34.74 50.86-34.75 50.86 0s-50.86 34.75-50.86 0zm-122.61 70.69c-3.44-16.94 22.18-22.18 25.62-5.21l.06.28c4.14 21.42 29.85 44 64.12 43.07 35.68-.94 59.25-22.21 64.11-42.77 4.46-16.05 28.6-10.36 25.47 6-5.23 22.18-31.21 62-91.46 62.9-42.55 0-80.88-27.84-87.9-64.25z"></path></svg>
                                        &nbsp;
                                        <span>Waze</span>
                                    </a>
                                    <a 
                                        href="https://maps.google.com/maps?q={{ $template_data->location_short }}&t=&z=13&ie=UTF8&iwloc="
                                        target="_blank"
                                        class="textLocation"
                                        style="border-radius: 15px 0px 10px 0px">
                                        {{-- <SiGooglemaps size='20px' />&nbsp; --}}
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" role="img" viewBox="0 0 24 24" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg"><title></title><path d="M19.527 4.799c1.212 2.608.937 5.678-.405 8.173-1.101 2.047-2.744 3.74-4.098 5.614-.619.858-1.244 1.75-1.669 2.727-.141.325-.263.658-.383.992-.121.333-.224.673-.34 1.008-.109.314-.236.684-.627.687h-.007c-.466-.001-.579-.53-.695-.887-.284-.874-.581-1.713-1.019-2.525-.51-.944-1.145-1.817-1.79-2.671L19.527 4.799zM8.545 7.705l-3.959 4.707c.724 1.54 1.821 2.863 2.871 4.18.247.31.494.622.737.936l4.984-5.925-.029.01c-1.741.601-3.691-.291-4.392-1.987a3.377 3.377 0 0 1-.209-.716c-.063-.437-.077-.761-.004-1.198l.001-.007zM5.492 3.149l-.003.004c-1.947 2.466-2.281 5.88-1.117 8.77l4.785-5.689-.058-.05-3.607-3.035zM14.661.436l-3.838 4.563a.295.295 0 0 1 .027-.01c1.6-.551 3.403.15 4.22 1.626.176.319.323.683.377 1.045.068.446.085.773.012 1.22l-.003.016 3.836-4.561A8.382 8.382 0 0 0 14.67.439l-.009-.003zM9.466 5.868L14.162.285l-.047-.012A8.31 8.31 0 0 0 11.986 0a8.439 8.439 0 0 0-6.169 2.766l-.016.018 3.665 3.084z"></path></svg>
                                        &nbsp;
                                        <span>Google Map</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('ekad.components.Contact')

                    @include('ekad.components.Music')

                    <div class="footerNavbarCps">
                        <div class="row-cps">
                            <div class="col-cps">
                                <div id="btn-calendar" class="custom isDown">
                                    <div class="text-center" style="width:100%; padding-bottom:5px">
                                        {{-- <FontAwesomeIcon icon={faCalendarAlt} size='2x'/> --}}
                                        <i class="fa fa-calendar-alt" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="text-center" style="width:100%">
                                        <span  class="text-white">Calendar</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-cps">
                                <div id="btn-location" class="custom isDown">
                                    <div class="text-center" style="width:100%; padding-bottom:5px">
                                        {{-- <FontAwesomeIcon icon={faCalendarAlt} size='2x'/> --}}
                                        <i class="fa fa-location-arrow" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="text-center" style="width:100%">
                                        <span  class="text-white">Location</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-cps">
                                <div id="btn-contact" class="custom isDown">
                                    <div class="text-center" style="width:100%; padding-bottom:5px">
                                        {{-- <FontAwesomeIcon icon={faCalendarAlt} size='2x'/> --}}
                                        <i class="fa fa-phone-alt" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="text-center" style="width:100%">
                                        <span  class="text-white">Call</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-cps">
                                <div id="btn-music" class="custom isDown">
                                    <div class="text-center" style="width:100%; padding-bottom:5px">
                                        {{-- <FontAwesomeIcon icon={faCalendarAlt} size='2x'/> --}}
                                        <i class="fa-solid fa-music" style="font-size: 30px;"></i>
                                    </div>
                                    <div class="text-center" style="width:100%">
                                        <span  class="text-white">Music</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        {{-- <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="{{asset('assets/js/core/particles.min.js')}}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/1.18.1/tsparticles.min.js"
            integrity="sha512-PYHWDEuXOTJ9MZ+/QHqkbgiEYZ+LImQv3i/9NyYOABFvK37e4q4Wg7aQDN1JpoGiEu1TYZh6JMrZluZox2gbDA=="
            crossorigin="anonymous"
        ></script>
        <script src='//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
        <script src="{{asset('assets/js/core/moment-with-locales.min.js')}}"></script>
        <script src="{{asset('assets/js/core/sweetalert2.min.js')}}"></script>
        <script type="text/javascript">
            AOS.init();

            const splash = document.querySelector('.splash');
            document.addEventListener('DOMContentLoaded', (e)=>{
                setTimeout(()=>{
                    splash.classList.add('display-none');
                }, 2000);
            });

            // document.onreadystatechange = function() {
            //     if (document.readyState !== "complete") {
            //         // setTimeout(
            //         //     function() 
            //         //     {
            //                 document.querySelector(
            //                 "body").style.visibility = "hidden";
            //                 document.querySelector(
            //                 "#loader").style.visibility = "visible";
            //             // },500);
            //     } else {
            //         document.querySelector(
            //         "#loader").style.display = "none";
            //         document.querySelector(
            //         "body").style.visibility = "visible";
            //     }
            // };

            document.addEventListener("visibilitychange", event => {
            if (document.visibilityState === "visible" && $('#playpausebtn > i').hasClass('fa-pause')) {
                document.getElementById('lagu').play();
            } else {
                const audio = document.getElementById('lagu');
                audio && audio.pause();
            }
            });

            $(document).ready(function() {
                var table = $('#datatables').DataTable({
                    "serverSide": true,
                    "processing": true,
                    "searching": false,
                    "paging": false,
                    "info": false,
                    "language": {
                        "emptyTable": "Tiada Ucapan diberikan."
                    },
                    "ajax":{
                        "url": "{{ url('recipient_wishes') }}/{{ $user_id }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function(d){ 
                        d._token= "{{csrf_token()}}";
                        }
                    },
                    "columns": [
                    { 
                        "data": "name_recipient",
                        "render": function(data, type, row, meta)
                        {
                            return '<span style="font-size:12px; font-style: italic">from</span>&nbsp;<span class="namatetamu">' + row.name_recipient + ' (' + row.lookup_desc + ')' + '</span><br/><span class="commenttetamu">' + row.comment_recipient + '</span><hr/>';
                        }
                    }
                    ]  
                });

                setTimeout(()=>{
                    Swal.fire({
                        position: 'top', 
                        customClass: {
                            popup: 'swal-text-custom',
                            title: 'swal-text-custom',
                        },
                        title: 'Would You Like To AutoPlay Music?',
                        showDenyButton: true,
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: 'Yes',
                        denyButtonText: `No`,
                        confirmButtonColor: '#3085d6',
                        denyButtonColor: '#d33',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $("#playpausebtn > i").addClass('fa-pause');
                            document.getElementById('lagu').play();
                        } 
                        else if (result.isDenied) {
                            $("#playpausebtn > i").addClass('fa-play');
                        }
                    });
                }, 2500);

                const particles1 = {
                    // "fpsLimit": 120,
                    "particles": {
                    "number": {
                        "value": 300,
                        "density": {
                        "enable": false,
                        // "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ff0000",
                        "animation": {
                        "enable": true,
                        "speed": 20,
                        "sync": true
                        }
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                        "width": 0
                        },
                        "polygon": {
                        "nb_sides": 5
                        },
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                        "enable": false,
                        "speed": 3,
                        "opacity_min": 0.1,
                        "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                        "enable": false,
                        "speed": 20,
                        "size_min": 0.3,
                        "sync": false
                        }
                    },
                    "links": {
                        "enable": true,
                        "distance": 100,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 6,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                        }
                    }
                    },
                    "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                        "enable": true,
                        "mode": "repulse"
                        },
                        "onclick": {
                        "enable": true,
                        "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                        },
                        "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 0.8
                        },
                        "repulse": {
                        "distance": 200
                        },
                        "push": {
                        "particles_nb": 4
                        },
                        "remove": {
                        "particles_nb": 2
                        }
                    }
                    },
                    "retina_detect": true,
                    "background": {
                    "color": "#fff",
                    "image": "",
                    "position": "50% 50%",
                    "repeat": "no-repeat",
                    "size": "cover"
                    }
                };

                const particles = {
                    "particles": {
                        "number": {
                            "value": 300,
                            "density": {
                            "enable": false,
                            // "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#ff0000",
                            "animation": {
                            "enable": true,
                            "speed": 20,
                            "sync": true
                            }
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                            "width": 0
                            },
                            "polygon": {
                            "nb_sides": 5
                            },
                        },
                        "opacity": {
                            "value": 0.5,
                            "random": false,
                            "anim": {
                            "enable": false,
                            "speed": 3,
                            "opacity_min": 0.1,
                            "sync": false
                            }
                        },
                        "size": {
                            "value": 3,
                            "random": true,
                            "anim": {
                            "enable": false,
                            "speed": 20,
                            "size_min": 0.3,
                            "sync": false
                            }
                        },
                        "links": {
                            "enable": true,
                            "distance": 100,
                            "color": "#ffffff",
                            "opacity": 0.4,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 1,
                            "direction": "top",
                            "random": true,
                            "straight": false,
                            "out_mode": "out",
                            "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "bubble"
                            },
                            "onclick": {
                                "enable": true,
                                "mode": "repulse"
                            }
                        },
                        "modes": {
                            "bubble": {
                                "distance": 250,
                                "duration": 2,
                                "size": 0,
                                "opacity": 0
                            },
                            "repulse": {
                                "distance": 400,
                                "duration": 4
                            }
                        }
                    },
                    "retina_detect": true,
                    "background": {
                        "color": "#fff",
                        "image": "",
                        "position": "50% 50%",
                        "repeat": "no-repeat",
                        "size": "cover"
                    }
                };
                
                tsParticles.load('particles-js', particles);

                // Countdown
                var then = moment("{{ $template_data->date_event }}");
                var now = moment();
                var countdown = moment(then - now) ;
                console.log(then-now);
                console.log(countdown / (1000 * 60 * 60 * 24));
                function getCounterData(obj) {
                    // var days = parseInt($('.e-m-days', obj).text());
                    // var hours = parseInt($('.e-m-hours', obj).text());
                    // var minutes = parseInt($('.e-m-minutes', obj).text());
                    // var seconds = parseInt($('.e-m-seconds', obj).text());
                    var days = countdown / (1000 * 60 * 60 * 24);
                    // const hours = countdown.format('HH');
                    var hours = countdown % (1000 * 60 * 60 * 24) / (1000 * 60 * 60)
                    // const minutes = countdown.format('mm');
                    var minutes = countdown % (1000 * 60 * 60) / (1000 * 60)
                    // const seconds = countdown.format('ss');
                    var seconds = countdown % (1000 * 60) / (1000)
                    return seconds + (minutes * 60) + (hours * 3600) + (days * 3600 * 24);
                }

                function setCounterData(s, obj) {
                    var days = Math.floor(s / (3600 * 24));
                    var hours = Math.floor((s % (60 * 60 * 24)) / (3600));
                    var minutes = Math.floor((s % (60 * 60)) / 60);
                    var seconds = Math.floor(s % 60);

                    // console.log(days, hours, minutes, seconds);

                    $('.e-m-days', obj).html(days);
                    $('.e-m-hours', obj).html(hours);
                    $('.e-m-minutes', obj).html(minutes);
                    $('.e-m-seconds', obj).html(seconds);
                }

                var count = getCounterData($(".counter"));

                var timer = setInterval(function() {
                    count--;
                    if (count == 0) {
                    clearInterval(timer);
                    return;
                    }
                    setCounterData(count, $(".counter"));
                }, 1000);

                
                // Calendar
                $('#btn-calendar').click(function(){
                    event.preventDefault();

                    if ( $("#Location").hasClass('animate__zoomInUp')) {
                        $("#Location").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Contact").hasClass('animate__zoomInUp')) {
                        $("#Contact").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Music").hasClass('animate__bounceInUp')) {
                        $("#Music").removeClass('animate__bounceInUp').addClass('animate__bounceOutDown')
                    }

                    if ( $(this).hasClass("isDown") ) {
                        // $("#Calendar").stop().animate({marginTop:"-100px"}, 200);
                        $(this).removeClass("isDown");
                        $("#Calendar").removeClass('hidden').addClass('animate__zoomInUp').addClass('active'); 
                    } else {
                        //     $("#Calendar").stop().animate({marginTop:"0px"}, 200);
                        $("#Calendar").toggleClass("animate__zoomOutDown animate__zoomInUp");
                    }

                    return false;
                })
                // Location
                $('#btn-location').click(function(){
                    event.preventDefault();
                    
                    if ( $("#Calendar").hasClass('animate__zoomInUp')) {
                        $("#Calendar").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Contact").hasClass('animate__zoomInUp')) {
                        $("#Contact").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Music").hasClass('animate__bounceInUp')) {
                        $("#Music").removeClass('animate__bounceInUp').addClass('animate__bounceOutDown')
                    }

                    if ( $(this).hasClass("isDown") ) {
                        // $("#Calendar").stop().animate({marginTop:"-100px"}, 200);
                        $(this).removeClass("isDown");
                        $("#Location").removeClass('hidden').addClass('animate__zoomInUp').addClass('active'); 
                    } else {
                        //     $("#Calendar").stop().animate({marginTop:"0px"}, 200);
                        $("#Location").toggleClass("animate__zoomOutDown animate__zoomInUp");
                    }

                    return false;
                })
                // Contact
                $('#btn-contact').click(function(){
                    event.preventDefault();
                    
                    if ( $("#Calendar").hasClass('animate__zoomInUp')) {
                        $("#Calendar").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Location").hasClass('animate__zoomInUp')) {
                        $("#Location").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Music").hasClass('animate__bounceInUp')) {
                        $("#Music").removeClass('animate__bounceInUp').addClass('animate__bounceOutDown')
                    }

                    if ( $(this).hasClass("isDown") ) {
                        // $("#Calendar").stop().animate({marginTop:"-100px"}, 200);
                        $(this).removeClass("isDown");
                        $("#Contact").removeClass('hidden').addClass('animate__zoomInUp'); 
                    } else {
                    //     $("#Calendar").stop().animate({marginTop:"0px"}, 200);
                    $("#Contact").toggleClass("animate__zoomOutDown animate__zoomInUp");
                    }

                    return false;
                })
                // Music
                $('#btn-music').click(function(){
                    event.preventDefault();
                    
                    if ( $("#Calendar").hasClass('animate__zoomInUp')) {
                        $("#Calendar").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Location").hasClass('animate__zoomInUp')) {
                        $("#Location").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }
                    else if ( $("#Contact").hasClass('animate__zoomInUp')) {
                        $("#Contact").removeClass('animate__zoomInUp').addClass('animate__zoomOutDown')
                    }

                    if ( $(this).hasClass("isDown") ) {
                        // $("#Calendar").stop().animate({marginTop:"-100px"}, 200);
                        $(this).removeClass("isDown");
                        $("#Music").removeClass('hidden').addClass('animate__bounceInUp'); 
                    } else {
                    //     $("#Calendar").stop().animate({marginTop:"0px"}, 200);
                    $("#Music").toggleClass("animate__bounceOutDown animate__bounceInUp");
                    }

                    return false;
                })

                $("#playpausebtn").click(function(){
                    event.preventDefault();
                    if ( $("#playpausebtn > i").hasClass("fa-pause") ) {
                        document.getElementById('lagu').pause();
                    }
                    else if ( $("#playpausebtn > i").hasClass("fa-play") ) {
                        document.getElementById('lagu').play();
                    }
                    $("#playpausebtn > i").toggleClass("fa-play fa-pause")
                })

                $('#recipient-form').submit(function(event){
                    event.preventDefault();
                    var formData = new FormData(this);
                    console.log(formData);
                    $.ajax({
                        url: '{{ route('insert_wishes') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(result){
                            table.ajax.reload();
                            Swal.fire({
                                title: "Terima Kasih!",
                                text: "Anda Telah Mengesahkan Kehadiran",
                                icon: "success",
                                button: "Close",
                            });
                        }

                    })
                })
            });
        </script>
    </body>
</html>