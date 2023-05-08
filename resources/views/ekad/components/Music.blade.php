<div id="Music" class="footer1-navbar-cps hidden animate__animated" style="background-color:transparent; box-shadow:0px 0px 0px">
    <div class="musicBody" style="background:#ffffff26">
        <div class="cardMusic">
            <div class="currentSong" style="width:300px">
                <span class="songName">{{ $template_data->music_title }}</span>
                <span class="songAutor">{{ $template_data->music_author }}</span>

                <div class="controls" style="padding-bottom:80px">
                    <audio class='player_audio' src='{!! asset('{{ $template_data->music_path }}')!!}'></audio>
                    <audio id="lagu" hidden controls loop controls>
                        <source src="{{ $template_data->music_path }}" type="audio/mpeg">
                      Your browser does not support the audio element.
                      </audio>
                    <button id="playpausebtn" class="play current-btn">
                        <i class="fa-solid"></i>
                        {{-- {
                            (!this.props.play) ? <FaPlay />
                            :<FaPause />
                        } --}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // const audio = new Audio("{!! asset('assets/img/Perfect - Ed Sheeran (Sax Cover Graziatto).mp3')!!}");

    // $("#lagu").trigger("play");
</script>