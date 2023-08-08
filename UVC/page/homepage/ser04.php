<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

	<title>UVC</title>

    <!-- FONT -->

	<!-- CSS -->
    <?php include_once $this->dir."page/homepage/include/common_css.php"; ?>
    <link rel="stylesheet" type="text/css" href="UVC/page/homepage/css/sub.css<?php echo $version;?>"/>

    <!-- SCRIPT -->
    <?php include_once $this->dir."page/homepage/include/common_js.php"; ?>

    

</head>
<body>
    <div class="wrap">        
        <?php include_once $this->dir."page/homepage/include/header.php"; ?>
        <?php include_once $this->dir."page/homepage/include/top_btn.php"; ?>
        <?php include_once $this->dir."page/homepage/include/ser-banner.php"; ?>
        <div class="sub-banner-tab">
          <div class="bd-lg dis-f align-i-c bg-w">
            <h3>PRODUCT</h3>
            <ul class="dis-f">
              <li><a href="?param=ser01"><i>CPS</i></a></li>
              <li><a href="?param=ser06"><i>XR</i></a></li>
              <li><a href="?param=ser03"><i>MES</i></a></li>
              <li><a class="lang_on" href="?param=ser04"><i>EDGE.</i></a></li>
              <li><a href="?param=ser05"><i>EDUKIT</i></a></li>
            </ul>
          </div>
        </div>
        <div class="sub-body">
          <div class="inner">
            <div class="ser_con ser_con04">
              <div class="main_title">
                  <span class="wow fadeInUp">PRODUCT</span>
                  <b class="wow fadeInUp" data-wow-delay="0.3s">EDGE</b>
              </div>
              <div class="contents">
                <div class="con main_con txt_only con01 pt-0">
                  <div class="bd-lg">
                    <div class="con_in">
                      <div class="txt_wrap">
                        <b><?php echo $this->utillLangController->lang("ser04","엣지디바이스");?></b>
                        <p>
                          <span><?php echo $this->utillLangController->lang("ser04","다양한 산업용 Device(PLC. Sensor 등)의 데이터를 취득하여 OPC UA Server를 통하여 실시간 자동 모델링합니다.");?></span>
                          <span><?php echo $this->utillLangController->lang("ser04","Plug & Play로 동작하여 쉽고 빠르게 설치할 수 있으며 작동법이 간편합니다.");?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="con con02 bg-gray">
                 <div class="bd-lg">
                  <b class="sec-title"><?php echo $this->utillLangController->lang("ser04","제품기능");?></b>
                  <div class="con_in">
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <div class="txt_in h-100 bg-w">
                          <p><?php echo $this->utillLangController->lang("ser04","이기종 디바이스 및 타 시스템과의 연계 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","실시간 데이터 수집 및 전송 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","EDGE 원격 설정 및 모니터링 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","CPS 플랫폼을 통한 OPC UA 모델링 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","CPS 플랫폼을 통한 디바이스 및 프로파일 관리 가능");?></p>
                        </div>
                      </div>
                      <div class="txt_wrap dot  col-md-6 col-xs-12 ">
                        <div class="txt_in h-100 bg-w">
                          <p><?php echo $this->utillLangController->lang("ser04","컴팩트한 사이즈로 공간 제약이 없어 다양한 현장에 설치 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","다양한 하드웨어 인터페이스를 통한 다양한 장비 연결 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","HDMI, VGA를 통한 외부 스크린 확장 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","Plug & Play를 통한 손쉬운 설치 가능");?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="con_in">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("ser04","제품특징");?></b>
                    <div class="dis-f flex-wrap row">
                      <div class="txt_wrap dot col-md-6 col-xs-12 ">
                        <div class="txt_in h-100 bg-w">
                          <p><?php echo $this->utillLangController->lang("ser04","OPC UA Framework 기반 Historian, Alarm, Method 탑재");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","클라우드 연계 및 PubSub@TSN, MQTT 기반의 통신 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","OPC UA를 통한 표준 프로토콜 및 사설 비표준 프로토콜의 데이터 표준화 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","데이터 필터링을 통한 전송대역 절약");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","P2P를 통한 타 시스템 및 엣지와 통신 가능");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","네트워크 유실 시 엣지 로컬 백업을 통한 데이터 손실 방지");?></p>
                          <p><?php echo $this->utillLangController->lang("ser04","엣지 클러스터링을 통한 무정지 서비스 가능");?></p>

                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                </div>
                <div class="con con03 pb-0">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("ser04","설치방법");?></b>
                    <div class="con_in">
                      <div class="list_con">
                        <ul class="row dis-f flex-wrap">
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-gray">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img04.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">1</i></b>
                                <p><?php echo $this->utillLangController->lang("ser04","전원 넣는다");?>.</p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-gray">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img05.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">2</i></b>
                                <p><?php echo $this->utillLangController->lang("ser04","LAN 선을 꽂는다");?>.</p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-gray">
                              <div class="icon_wrap"><img style="width:auto; object-fit:contain; height:190px;  max-width:100%; " src="UVC/page/homepage/img/sub/ser_img06.gif" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">3</i></b>
                                <p><?php echo $this->utillLangController->lang("ser04","전원 버튼을 누른다");?>.</p>
                              </div>
                            </div>
                          </li>
                          <li class="col-md-3 col-xs-6">
                            <div class="con_wrap arrow bg-gray">
                              <div class="icon_wrap"><img  style="width:auto; object-fit:contain; height:190px;  max-width:100%; "src="UVC/page/homepage/img/sub/ser_img07.png" alt=""/></div>
                              <div class="txt_wrap">
                                <b>STEP <i class="fc-g">4</i></b>
                                <p><?php echo $this->utillLangController->lang("ser04","PROCESS 자동로드");?></p>
                              </div>
                            </div>
                          </li>
                         
                        </ul>
                      </div>
                    </div>
                   
                  </div>
                </div>
                <div class="con con04 pb-0">
                  <div class="bd-lg">
                    <b class="sec-title"><?php echo $this->utillLangController->lang("ser04","제품스팩");?></b>
                    <div class="con_in">
                      <div class="spec_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser04","상품 제품명");?></b>
                        <div >
                          <div class="left">
                            <div class="img_list">
                              <ul class="row">
                                <li class="col-md-4 col-xs-6">
                                  <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img09.png" alt=""/></div>
                                </li>
                                <li class="col-md-4 col-xs-6">
                                  <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img10.png" alt=""/></div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="right">
                            <div class="table_wrap">
                              <table>
                                <tr>
                                  <th>Case Size</th>
                                  <td>201*200*52 mm (<?php echo $this->utillLangController->lang("ser04","브라켓 포함 사이즈");?> 234 * 200 *52mm)</td>
                                </tr>
                                <tr>
                                  <th>Processor</th>
                                  <td>Support I5 5200U 2.2GHZ Max 2.7GHZ</td>
                                </tr>
                                <tr>
                                  <th>RAM</th>
                                  <td>2x DDR3, Support up to 16GB</td>
                                </tr>
                                <tr>
                                  <th>Ethernet</th>
                                  <td>1000M LAN, Realtek 8111F.2x LAN option</td>
                                </tr>
                                <tr>
                                  <th>Audio</th>
                                  <td>Realtek ALC662 HD audio, Support Line-in, Line-out, Mic-in, Spdif, Speaker</td>
                                </tr>
                                <tr>
                                  <th>Display</th>
                                  <td>Intel HD Graphics 510/610 Support 4K/1080P/H264/3D Play</td>
                                </tr>
                                <tr>
                                  <th>Storage</th>
                                  <td>Sata3.0x1, MSata3.0x1</td>
                                </tr>
                                <tr>
                                  <th>Power Supply</th>
                                  <td>DC 12V/19 Power Supply</td>
                                </tr>
                                <tr>
                                  <th>CPU-Fan</th>
                                  <td>Thin Cool Fan</td>
                                </tr>
                                <tr>
                                  <th>Size</th>
                                  <td>Mini-ITX, 170mm x 170mm x 18mm</td>
                                </tr>
                                <tr>
                                  <th>Rear I/O</th>
                                  <td>DC_in, HDMI, VGA (DVI), 4x USB, 1xLAN, 1xLine-OUT, 1xMic_in</td>
                                </tr>
                                <tr>
                                  <th>Built-in I/O</th>
                                  <td>1x24 bit LVDS, 4xUSB2.0, 2xUSB3.0, 2xRS232(6COM option, RS485/RS422)</td>
                                </tr>
                                <tr>
                                  <th>Expansion</th>
                                  <td>1xMini-PCIE, Support WIFI, 3G, Bluetooth, GPS, MSATA</td>
                                </tr>
                                <tr>
                                  <th>Temperature</th>
                                  <td>-10℃ to 60℃ (Working Temperature) / -40℃ to 80℃ (Storage Temperature)</td>
                                </tr>
                                <tr>
                                  <th>Operating Humidity</th>
                                  <td>0~90%, non-condensation</td>
                                </tr>
                                <tr>
                                  <th>COM(Serial port)</th>
                                  <td><?php echo $this->utillLangController->lang("ser04","COM1~COM6 RS232지원 / COM2번포트 Support RS232/422/485");?>)</td>
                                </tr>
                                <tr>
                                  <th>Working environment</th>
                                  <td>10℃ to 60℃ (option - 20℃ ~ 70℃)</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="con_in">
                      <div class="spec_con">
                        <b class="sub-title-point"><?php echo $this->utillLangController->lang("ser04","상품 제품명");?></b>
                        <div>
                          <div class="left">
                          <div class="img_list">
                              <ul class="row">
                                <li class="col-md-4 col-xs-6">
                                  <div class="img_wrap"><img src="UVC/page/homepage/img/sub/ser_img08.png" alt=""/></div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="right">
                            <div class="table_wrap">
                              <table>
                                <tr>
                                  <th>Case Size</th>
                                  <td>264.5 x 68.4 x 133.0 mm</td>
                                </tr>
                                <tr>
                                  <th>Processor</th>
                                  <td>Intel® Celeron® J1900 Quad Core 2.0 GHz SoC with Turbo boost support</td>
                                </tr>
                                <tr>
                                  <th>RAM</th>
                                  <td>DDR3, 8GB</td>
                                </tr>
                                <tr>
                                  <th>Ethernet</th>
                                  <td>10/100/1000 Mbps Intel I210 GbE, support Wake on LAN</td>
                                </tr>
                                <tr>
                                  <th>Audio</th>
                                  <td>Realtek ALC888S, High Definition Audio. Line-out,Mic-in,Line-in</td>
                                </tr>
                                <tr>
                                  <th>Display</th>
                                  <td>DirectX 11.1, OCL 1.2, OGL 3.2; Encode: H.264, MPEG2/4, VC1, WMV9; Decode: H.264, MPEG2</td>
                                </tr>
                                <tr>
                                  <th>Storage</th>
                                  <td>1 x full size mSATA socket, with USB signal co-lay, 1 x 2.5" SATA Drive bay (Compatible with 12.5mm height)</td>
                                </tr>
                                <tr>
                                  <th>Power Supply</th>
                                  <td>9 ~ 36 VDC / AC to DC, DC19 V/3.42 A, 65 W (Optional)</td>
                                </tr>
                                <tr>
                                  <th>I/O</th>
                                  <td>1 x USB 3.0, 5 x USB 2.0, 1 x internal USB 2.0 for security dongle</td>
                                </tr>
                                <tr>
                                  <th>GPIO</th>
                                  <td>8-bit</td>
                                </tr>
                                <tr>
                                  <th>Expansion</th>
                                  <td>1xMini-PCIE, 1 x Full-size mPCIe with SIM holder</td>
                                </tr>
                                <tr>
                                  <th>Temperature</th>
                                  <td>-20 ~ 70° C(Working Temperature) / -40 ~ 85° C(Storage Temperature)</td>
                                </tr>
                                <tr>
                                  <th>COM(Serial port)</th>
                                  <td>6 x RS232/ 422/ 485</td>
                                </tr>
                                <tr>
                                  <th>Working environment</th>
                                  <td>10℃ to 60℃ (option - 20℃ ~ 70℃)</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include_once $this->dir."page/homepage/include/footer.php"; ?>
    </div>
</body>

</html>