<style>
    .progress2 {
        background-color: #F7F7F7;
        background-image: -moz-linear-gradient(center top , #F5F5F5, #F9F9F9);
        background-repeat: repeat-x;
        border-radius: 6px 6px 6px 6px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        height: 10px;
        margin-bottom: 5px;
        margin-top: 15px;
        overflow: hidden;
        cursor:pointer;
        cursor:hand;
    }
    .progress2 .bar {
        -moz-box-sizing: border-box;
        -moz-transition: width 0.6s ease 0s;
        background-color: #5EB95E;
        background-image: -moz-linear-gradient(center top , #62C462, #57A957);
        background-repeat: repeat-x;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
        color: #FFFFFF;
        font-size: 8px;
        height: 10px;
        text-align: center;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        width: 0;
    }
    .jp-playlist {
    }
    .jp-playlist > ul {
        list-style: none outside none;
        margin-bottom: 18px;
        display: table;
        padding: 20px;
        margin-left: 0px;
    }

    .jp-playlist > ul > li {
        border: 1px solid #DDDDDD;
        border-radius: 5px 5px 5px 5px;
        clear: both;
        line-height: 28px;
        float: none;
        padding: 5px;
        margin: 5px;
    }

    .jp-playlist > ul > li:hover {
        background-color: #EEE;
        color: #FFF;
        z-index: 2px;
        text-decoration: none;
    }

    .jp-playlist > ul > li:hover > div > a {
        background-color: #EEE;
        color: #000;
    }
    
    .jp-playlist a {
        text-decoration: none;
        line-height: 20px;
        float: none;
    }

    .jp-playlist-current {
        background-color: #0088CC;
        color: #FFFFFF;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .jp-playlist-item-remove {
        margin-left: -40px;
        position: absolute;
        -moz-border-bottom-colors: none; -moz-border-image: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none;
        background-color: #F5F5F5;
        background-image: -moz-linear-gradient(center top , #FFFFFF, #E6E6E6);
        background-repeat: repeat-x;
        border-color: #CCCCCC #CCCCCC #B3B3B3;
        border-radius: 4px 4px 4px 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
        color: #BD362F;
        cursor: pointer;
        display: inline-block;
        font-size: 18px;
        line-height: 18px;
        margin-bottom: 0;
        padding: 2px 7px;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;


    }
</style>

<div class="navbar navbar-fixed-bottom" style="z-index:999999">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target="#contenido">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Estas escuchando:</a>
            <div class="span2" id="marquesina" style="margin-left:0px;margin-top:10px;"></div>
            <div class="nav-collapse" id="contenido">
               <div id="musicPlayer"></div>
                    <div id="musicPlayerContainer" class="jp-audio">
                        <div class="jp-type-playlist">
                            <div class="modal fade hide" id="myModal">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h3><b>Listado Actual</b></h3>
                                </div>
                                <div class="modal-body">
                                    <div class="span5">
                                        <div class="jp-playlist"><ul><li></li></ul></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn" data-dismiss="modal" id="cerrarModal">Cerrar</a>
                                </div>
                            </div>
                            <div class="jp-gui jp-interface">
                                <ul id="inline-playlist" class="jp-controls nav">
                                    <div align="center">
                                        <a href="javascript:;" id="anterior" class="jp-previous btn btn-info"><i class="icon-step-backward icon-white"></i></a>
                                        <a href="javascript:;" id="play" class="jp-play btn btn-info"><i class="icon-play icon-white"></i></a>
                                        <a href="javascript:;" id="pause" class="jp-pause btn btn-info"><i class="icon-pause icon-white"></i></a>
                                        <a href="javascript:;" id="siguiente" class="jp-next btn btn-info"><i class="icon-step-forward icon-white"></i></a> 
                                        <a href="javascript:;" id="stop" class="jp-stop btn btn-info"><i class="icon-stop icon-white"></i></a> 
                                    </div>
                                </ul>
                                <div class="span3">
                                    <div class="jp-progress progress-striped active">
                                        <div class="jp-seek-bar progress2">
                                            <div class="jp-play-bar bar" style=""></div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="jp-time-holder span1 badge badge-info" style="margin-top:10px">
                                    <span class="jp-current-time"></span> / <span class="jp-duration"></span>
                                </div> 
                                <div class="span2">
                                    <a class="btn btn-success pull-right" id="playList"><i class="icon-chevron-up icon-white"></i> Mostrar listado</a>
                                </div> 
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>  
</div>