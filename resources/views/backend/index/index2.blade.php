@extends('backend.base')

@section('content')
    <div class="layui-row layui-col-space15">

        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    访问量
                    <span class="layui-badge layui-bg-blue layuiadmin-badge">周</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">
                    <p class="layuiadmin-big-font">9,999,888</p>
                    <p>
                        总计访问量
                        <span class="layuiadmin-span-color">88万 <i class="layui-inline layui-icon layui-icon-flag"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    下载
                    <span class="layui-badge layui-bg-cyan layuiadmin-badge">月</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">
                    <p class="layuiadmin-big-font">33,555</p>
                    <p>
                        新下载
                        <span class="layuiadmin-span-color">10% <i class="layui-inline layui-icon layui-icon-face-smile-b"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    点赞
                    <span class="layui-badge layui-bg-green layuiadmin-badge">年</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">

                    <p class="layuiadmin-big-font">999,888</p>
                    <p>
                        总赞
                        <span class="layuiadmin-span-color">*** <i class="layui-inline layui-icon layui-icon-heart"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    活跃用户
                    <span class="layui-badge layui-bg-orange layuiadmin-badge">月</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">

                    <p class="layuiadmin-big-font">66,888</p>
                    <p>
                        最近一个月
                        <span class="layuiadmin-span-color">15% <i class="layui-inline layui-icon layui-icon-user"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm12">
            <div class="layui-card">
                <div class="layui-card-header">
                    访问量
                    <div class="layui-btn-group layuiadmin-btn-group">
                        <a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">去年</a>
                        <a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">今年</a>
                    </div>
                </div>
                <div class="layui-card-body">
                    <div class="layui-row">
                        <div class="layui-col-sm8">
                            <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-pagetwo" lay-anim="fade" style="width: 100%; height: 280px;">
                                <div carousel-item="" id="LAY-index-pagetwo">
                                    <div class="layui-this" _echarts_instance_="1719138692702" style="-webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0); cursor: default;"><div style="position: relative; overflow: hidden; width: 660px; height: 332px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 660px; height: 332px; user-select: none;"></div><canvas width="990" height="498" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 660px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="990" height="498" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 660px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="990" height="498" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 660px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s ease 0s, top 0.4s ease 0s; background-color: rgba(50, 50, 50, 0.5); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font-family: 微软雅黑, Arial, Verdana, sans-serif; padding: 5px; left: 528px; top: 119px;">11月<br>访问量 : 1,250<br>下载量 : 1,000<br>平均访问量 : 1,150</div></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-sm4">
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月访问数</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showpercent="yes">
                                    <div class="layui-progress-bar" lay-percent="30%" style="width: 30%;"><span class="layui-progress-text">30%</span></div>
                                </div>
                            </div>
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月下载数</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showpercent="yes">
                                    <div class="layui-progress-bar" lay-percent="20%" style="width: 20%;"><span class="layui-progress-text">20%</span></div>
                                </div>
                            </div>
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月点赞数</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showpercent="yes">
                                    <div class="layui-progress-bar" lay-percent="25%" style="width: 25%;"><span class="layui-progress-text">25%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-sm4">
            <div class="layui-card">
                <div class="layui-card-header">用户留言</div>
                <div class="layui-card-body">
                    <ul class="layuiadmin-card-status layuiadmin-home2-usernote">
                        <li>
                            <h3>张三</h3>
                            <p>作为 layui 官方推出的后台模板，从初版的饱受争议，到后续的埋头丰富，逐步占据了国内后台系统应用的主要市场。</p>
                            <span>5月30日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="7" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                        <li>
                            <h3>诸葛亮</h3>
                            <p>皓首匹夫！苍髯老贼！你枉活九十有六，一生未立寸功，只会摇唇鼓舌！助曹为虐！一条断脊之犬，还敢在我军阵前狺狺狂吠，我从未见过有如此厚颜无耻之人！</p>
                            <span>5月02日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="5" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                        <li>
                            <h3>张三</h3>
                            <p>你以为只要长得漂亮就有男生喜欢？你以为只要有了钱漂亮妹子就自己贴上来了？你以为学霸就能找到好工作？我告诉你吧，这些都是真的！</p>
                            <span>5月11日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="6" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                        <li>
                            <h3>杜甫</h3>
                            <p>人才虽高，不务学问，不能致圣。刘向十日画一水，五日画一石。</p>
                            <span>4月11日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="2" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                        <li>
                            <h3>鲁迅</h3>
                            <p>路本是无所谓有和无的，走的人多了，就没路了。。</p>
                            <span>4月28日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="4" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                        <li>
                            <h3>张爱玲</h3>
                            <p>于千万人之中遇到你所要遇到的人，于千万年之中，时间的无涯的荒野中，没有早一步，也没有晚一步，刚巧赶上了，那也没有别的话好说，唯有轻轻的问一声：“噢，原来你也在这里？”</p>
                            <span>4月11日 00:00</span>
                            <a href="javascript:;" layadmin-event="replyNote" data-id="1" class="layui-btn layui-btn-xs layuiadmin-reply">回复</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="layui-col-sm8">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6">
                    <div class="layui-card">
                        <div class="layui-card-header">本周活跃用户列表</div>
                        <div class="layui-card-body">
                            <table class="layui-table layuiadmin-page-table" lay-skin="line">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>最后登录时间</th>
                                    <th>状态</th>
                                    <th>获得赞</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><span class="first">张三</span></td>
                                    <td><i class="layui-icon layui-icon-log"> 11:20</i></td>
                                    <td><span>在线</span></td>
                                    <td>22 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="second">张三</span></td>
                                    <td><i class="layui-icon layui-icon-log"> 10:40</i></td>
                                    <td><span>在线</span></td>
                                    <td>21 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="third">李四</span></td>
                                    <td><i class="layui-icon layui-icon-log"> 01:30</i></td>
                                    <td><i>离线</i></td>
                                    <td>66 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td>王五</td>
                                    <td><i class="layui-icon layui-icon-log"> 21:18</i></td>
                                    <td><i>离线</i></td>
                                    <td>45 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td>许上进</td>
                                    <td><i class="layui-icon layui-icon-log"> 09:30</i></td>
                                    <td><span>在线</span></td>
                                    <td>21 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td>小蚊子</td>
                                    <td><i class="layui-icon layui-icon-log"> 21:18</i></td>
                                    <td><i>在线</i></td>
                                    <td>45 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                <tr>
                                    <td>张三</td>
                                    <td><i class="layui-icon layui-icon-log"> 09:30</i></td>
                                    <td><span>在线</span></td>
                                    <td>21 <i class="layui-icon layui-icon-praise"></i></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="layui-col-sm6">
                    <div class="layui-card">
                        <div class="layui-card-header">项目进展</div>
                        <div class="layui-card-body">
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show">
                                    <table id="LAY-index-prograss" lay-filter="LAY-index-prograss"></table><div class="layui-table-view layui-table-view-1 layui-form layui-border-box" lay-filter="LAY-TABLE-FORM-DF-1" style="" lay-table-id="LAY-index-prograss"><div class="layui-table-box"><div class="layui-table-init layui-hide-v"><div class="layui-table-loading-icon"><i class="layui-icon layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop"></i></div></div><div class="layui-table-header"><table cellspacing="0" cellpadding="0" border="0" class="layui-table" lay-skin="line"><thead><tr><th data-field="0" data-key="1-0-0" data-unresize="true" class=" layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-indeterminate"></i></div></div></th><th data-field="prograss" data-key="1-0-1" class="" title="任务"><div class="layui-table-cell laytable-cell-1-0-1"><span>任务</span></div></th><th data-field="time" data-key="1-0-2" class="" title="所需时间"><div class="layui-table-cell laytable-cell-1-0-2"><span>所需时间</span></div></th><th data-field="complete" data-key="1-0-3" class="" title="完成情况"><div class="layui-table-cell laytable-cell-1-0-3"><span>完成情况</span></div></th></tr></thead></table></div><div class="layui-table-body layui-table-main"><table cellspacing="0" cellpadding="0" border="0" class="layui-table" lay-skin="line" style="width: auto;"><tbody><tr data-index="0" class="layui-table-checked"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" checked="" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">开会</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">一小时</div></td><td data-field="complete" data-key="1-0-3" data-content="已完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><del style="color: #16b777;">已完成</del></div></td></tr><tr data-index="1" class="layui-table-checked"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" checked="" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">项目开发</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">两小时</div></td><td data-field="complete" data-key="1-0-3" data-content="进行中" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FFB800;">进行中</span></div></td></tr><tr data-index="2"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">陪吃饭</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">一小时</div></td><td data-field="complete" data-key="1-0-3" data-content="未完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FF5722;">未完成</span></div></td></tr><tr data-index="3"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">修改小bug</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">半小时</div></td><td data-field="complete" data-key="1-0-3" data-content="未完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FF5722;">未完成</span></div></td></tr><tr data-index="4"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">修改大bug</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">两小时</div></td><td data-field="complete" data-key="1-0-3" data-content="未完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FF5722;">未完成</span></div></td></tr><tr data-index="5"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">修改小bug</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">半小时</div></td><td data-field="complete" data-key="1-0-3" data-content="未完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FF5722;">未完成</span></div></td></tr><tr data-index="6"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td><td data-field="prograss" data-key="1-0-1" class=""><div class="layui-table-cell laytable-cell-1-0-1">修改大bug</div></td><td data-field="time" data-key="1-0-2" class=""><div class="layui-table-cell laytable-cell-1-0-2">两小时</div></td><td data-field="complete" data-key="1-0-3" data-content="未完成" class=""><div class="layui-table-cell laytable-cell-1-0-3"><span style="color: #FF5722;">未完成</span></div></td></tr></tbody></table></div><div class="layui-table-fixed layui-table-fixed-l"><div class="layui-table-header"><table cellspacing="0" cellpadding="0" border="0" class="layui-table" lay-skin="line"><thead><tr><th data-field="0" data-key="1-0-0" data-unresize="true" class=" layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-indeterminate"></i></div></div></th></tr></thead></table></div><div class="layui-table-body" style="height: 271px;"><table cellspacing="0" cellpadding="0" border="0" class="layui-table" lay-skin="line"><tbody><tr data-index="0" class="layui-table-checked"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" checked="" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="1" class="layui-table-checked"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" checked="" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox layui-form-checked" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="2"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="3"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="4"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="5"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr><tr data-index="6"><td data-field="0" data-key="1-0-0" class="layui-table-col-special"><div class="layui-table-cell laytable-cell-1-0-0 laytable-cell-checkbox"><input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-type="layTableCheckbox" title=""><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon layui-icon-ok"></i></div></div></td></tr></tbody></table></div></div></div><div class="layui-table-column layui-table-page layui-hide"><div class="layui-inline layui-table-pageview layui-hide-v" id="layui-table-page1"></div></div><style id="LAY-STYLE-DF-table-1">.laytable-cell-1-0-0{width: 50px}.laytable-cell-1-0-1{width: 60px}.laytable-cell-1-0-2{width: 60px}.laytable-cell-1-0-3{width: 60px}</style></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-sm12">
                    <div class="layui-card">
                        <div class="layui-card-header">访客地区分布</div>
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space15">
                                <div class="layui-col-sm4">
                                    <table class="layui-table layuiadmin-page-table" lay-skin="line">
                                        <thead>
                                        <tr>
                                            <th>排名</th>
                                            <th>地区</th>
                                            <th>人数</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>浙江</td>
                                            <td>62310</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>上海</td>
                                            <td>59190</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>广东</td>
                                            <td>55891</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>北京</td>
                                            <td>51919</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>山东</td>
                                            <td>39231</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>湖北</td>
                                            <td>37109</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="layui-col-sm8">

                                    <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-pagethree" lay-anim="fade" style="width: 100%; height: 280px;">
                                        <div carousel-item="" id="LAY-index-pagethree">
                                            <div class="layui-this" _echarts_instance_="1719138692703" style="-webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0);"><div style="position: relative; overflow: hidden; width: 425px; height: 332px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 425px; height: 332px; user-select: none;"></div><canvas width="637" height="498" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 425px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="637" height="498" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 425px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="637" height="498" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 425px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
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
@endsection

