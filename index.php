<!DOCTYPE html>

<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>アクア de ショップ</title>
        <meta name="viewport" content="width=device-width">

        <!-- cssスタイルシート -->
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/index.css">
        
        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <!-- google-map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdv2adx2KcRlIsozaR9jBWb2ehwQSkjU4&callback=initMap"></script>
        <!-- <script type="text/javascript" src="js/googlemap.js"></script> -->
        <script type="text/javascript" src="js/googlemap2.js"></script>
        <!-- smoothオリジナル -->
        <script type="text/javascript" src="js/smooth.js"></script>
        
        <!-- three.js(+オブジェクト) -->
        
    </head>
    <body>
    
        <div id="wrap">
            <p id="page-top"><a href="#wrap">PAGE TOP</a></p>
            <nav>
                <a href="#event" id="icon01">
                    <img src="images/icon/fish.svg" width="120" height="60">
                    <p>イベント</p>
                </a>
                
                <a href="aqua.php" id="icon02">
                    <img src="images/icon/shop.svg" width="120" height="60">
                    <p>ショップ</p>
                </a>
                
                <a href="index.php">
                    <div class="icon"></div>
                </a>
                
                <a href="#news" id="icon03">
                    <img src="images/icon/news.svg" width="120" height="60">
                    <p>ニュース</p>
                </a>
                
                <a href="#info" id="icon04">
                    <img src="images/icon/event.svg" width="120" height="60">
                    <p>インフォメーション</p>
                </a>
            </nav>
            <div id="taisaku"></div><!-- position:fixedで高さが0になるのを対策 -->
            <div id="contents">
               
                <div id="video">
                   <video src="video/aquarium.mp4" height="450" loop autoplay></video>
                    <div id="nami"></div>
                </div>
                
                <section id="what">
                    <h2>アクア de ショップ とは？</h2>
                    <p>水族館とアクアリウムショップをかけた新しいwebサイト<br><br>
                    目で見て思い通りの自分のアクアリウムを作ろう！</p>
                    <div id="threeD"></div>
                    <a href="#">購入はこちら！</a>
                </section>
                
                <section id="images">
                    <div id="nami2"></div>
                    <div id="images-item">
                        <div class="kuhaku"><a href="http://www.nagoyaaqua.jp/limitation/2015012313331160.html"><img src="images/bana/bana4.png" width="430" height="450px"></a></div>
                        <div class="kuhaku"><a href="http://www.nagoyaaqua.jp/south/2014092414052366.html">
                        <img src="images/bana/bana5.png" width="430" height="450px"></a></div>
                    </div>
                    <div id="images-item2">
                        <div class="kuhaku"><a href="http://www.nagoyaaqua.jp/event/2014092411442672.html">
                        <img src="images/bana/bana6.png" width="430" height="450px"></a></div>
                        <div class="kuhaku"><a href="http://www.nagoyaaqua.jp/event/2014092423425258.html">
                        <img src="images/bana/bana7.png" width="430" height="450px"></a></div>
                    </div>
                </section>

                <section id="event">
                    <h2>イベント情報</h2>
                    <img src="images/event-image.png">
                    <p class="mozi">event</p>
                        <div id="bana">
                            <div class="bana-image">
                                <a href="http://www.nagoyaaqua.jp/event/2014092221323438.html">
                                    <img src="images/bana/bana1.png">
                                    <p>目にも留まらぬ速さで泳ぎ、弾丸のように水面から飛び出す。その迫力ある動きは、まさに生命の輝き。</p>
                                </a>
                            </div>
                            <div class="bana-image">
                                <a href="http://www.nagoyaaqua.jp/event/2014092500071285.html">
                                    <img src="images/bana/bana2.png">
                                    <p>飼育員がその日のテーマによって、ペンギンのことを詳しく解説してくれます。</p>
                                </a>
                            </div>
                            <div class="bana-image">
                                <a href="http://www.nagoyaaqua.jp/event/2014092411343750.html">
                                    <img src="images/bana/bana3.png">
                                    <p>静かな水面から突如として現れる、黒い巨体。
                                    何トンもの体から繰り出される豪快な動きに、身も心も奪われる！</p>
                                </a>
                            </div>
                        </div>
                    <div id="event-list">
                        <a href="#">イベント一覧へ</a>
                    </div>
                </section>
                
                <section id="news">
                    <h2>ニュース</h2>
                    <img src="images/event-image.png">
                    <p class="mozi">news</p>
                    <div id="news-list">
                        <!-- カード個数ここから -->
                         <div class="news-num">
                            <a href="#">
                                <div class="news-image">
                                    <img src="images/news/news01.jpg">
                                </div>

                                <div class="news-content">
                                    <h1>イルカのナイトパフォ－マンス</h1>
                                    <p>クリスマスイブの夜は、華麗なイルカのナイトパフォーマンスでお楽しみください。</p>
                                </div>
                            </a>
                        </div>
                        <!-- ここまで -->
                        <div id="news-list2">
                            <a href="#">ニュース一覧へ</a>
                        </div>
                    </div>
                </section>
                
                <div id="nami3"></div>
                
                <section id="info">
                    <div id="info2">
                        <div id="data">
                            <h2>インフォメーション</h2>
                            <dl class="clearfix">
                                <dt>施設名:</dt>
                                <dd>名古屋港水族館</dd>
                                <dt>ご利用時間:</dt>
                                <dd>9：30～17：30</dd>
                                <dt>休館日:</dt>
                                <dd>期間によって変更</dd>
                                <dt>入場料:</dt>
                                <dd id="other-dd">大人：2000円<br>
                                高校生：2000円<br>
                                小・中学生：1000円<br>
                                幼児(~4歳以上)：500円
                                </dd>
                                <dt>住所:</dt>
                                <dd>〒455-0033 名古屋市港区港町1番3号</dd>
                                <dt>TEL:</dt>
                                <dd>052-654-7080</dd>
                            </dl>
                        </div>
                        <div id="map"></div>
                    </div>
                </section>
                
            </div>

            <footer>
                <small id="copy">&copy; アクア de ショップ 3D All Rights Reserved.</small>
                <a href="index.php"><div class="icon"></div></a>
            </footer>

        </div>
    </body>
</html>