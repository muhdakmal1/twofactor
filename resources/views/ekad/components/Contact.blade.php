{{-- @section('Contact') --}}
<div id="Contact" class="footer1-navbar-cps hidden animate__animated">
    <div class="Calendar_custom">
        <div class="row">
            <div class="col-sm-12 div1">
                <div class="text-left">
                    <table width="100%" border="0">
                        <tbody>
                            <tr><td colSpan="4"><span class="thead" style="display:flex; justify-content:center; align-content:center;">Ahli Keluarga Untuk Dihubungi</span></td></tr>
                            <tr>
                                <td width="45%">
                                    <span class="familyName" >{{ $template_data->contact_person1 }}</span>
                                    <br/>
                                    <p style="margin-bottom:-10px">&nbsp;</p>
                                    <span class="familySub" >{{ $template_data->contact_relation1 }}</span>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="tel:+6{{ $template_data->contact_no1 }}"
                                        target="_blank"
                                    >
                                        {{-- <FontAwesomeIcon icon={faPhoneAlt} size='sm'/> --}}
                                        <span style=padding-left:3px;>CALL</span>
                                    </a>
                                </td>
                                <td width="25%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="http://wasap.my/6{{ $template_data->contact_no1 }}"
                                        target="_blank"
                                    >
                                        {{-- <FontAwesomeIcon icon={faWhatsapp} fixedWidth /> --}}
                                        <span>WHATSAPP</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colSpan="4"><hr/></td>
                            </tr>
                            <tr>
                                <td width="45%">
                                    <span class="familyName" >{{ $template_data->contact_person2 }}</span>
                                    <br/>
                                    <p style="margin-bottom:-10px">&nbsp;</p>
                                    <span class="familySub" >{{ $template_data->contact_relation2 }}</span>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="tel:+6{{ $template_data->contact_no2 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faPhoneAlt} size='sm'/> --}}
                                        <span style=padding-left:3px;>CALL</span>
                                    </a>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="http://wasap.my/6{{ $template_data->contact_no2 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faWhatsapp} size='sm'/> --}}
                                        <span style="padding-left:3px;">WHATSAPP</span>
                                    </a>
                                </td>
                            </tr>
                            @if($template_data->contact_person3 != null)
                            <tr>
                                <td colSpan="4"><hr/></td>
                            </tr>
                            <tr>
                                <td width="45%">
                                    <span class="familyName" >{{ $template_data->contact_person3 }}</span>
                                    <br/>
                                    <p style="margin-bottom:-10px">&nbsp;</p>
                                    <span class="familySub" >{{ $template_data->contact_relation3 }}</span>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="tel:+6{{ $template_data->contact_no3 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faPhoneAlt} size='sm'/> --}}
                                        <span style="padding-left:3px;">CALL</span>
                                    </a>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="http://wasap.my/6{{ $template_data->contact_no3 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faWhatsapp} size='sm'/> --}}
                                        <span style="padding-left:3px;">WHATSAPP</span>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @if($template_data->contact_person4 != null)
                            <tr>
                                <td colSpan="4"><hr/></td>
                            </tr>
                            <tr>
                                <td width="45%">
                                    <span class="familyName" >{{ $template_data->contact_person4 }}</span>
                                    <br/>
                                    <p style="margin-bottom:-10px">&nbsp;</p>
                                    <span class="familySub" >{{ $template_data->contact_relation4 }}</span>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="tel:+6{{ $template_data->contact_no4 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faPhoneAlt} size='sm'/> --}}
                                        <span style="padding-left:3px;">CALL</span>
                                    </a>
                                </td>
                                <td width="20%">
                                    <a
                                        class="btn btn-sm btnCall"
                                        href="http://wasap.my/6{{ $template_data->contact_no4 }}"
                                        target="_blank"
                                        style="float: right"
                                    >
                                        {{-- <FontAwesomeIcon icon={faWhatsapp} size='sm'/> --}}
                                        <span style="padding-left:3px;">WHATSAPP</span>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td colSpan="4"><hr/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}