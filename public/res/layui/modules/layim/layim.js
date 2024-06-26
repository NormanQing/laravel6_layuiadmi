/** The Web UI Theme-v3.9.9 */
;layui.define(["layer", "laytpl", "upload"], function(O) {
    function a() {
        this.v = t,
        m("body").on("click", "*[layim-event]", function(a) {
            var i = m(this)
              , e = i.attr("layim-event");
            N[e] && N[e].call(this, i, a)
        })
    }
    function s(a) {
        return (a = a || {}).item = a.item || "d." + a.type,
        ["{{# var length = 0; layui.each(" + a.item + ", function(i, data){ length++; }}", '<li layim-event="chat" data-type="' + a.type + '" data-index="{{= ' + (a.index || "i") + ' }}" class="layim-' + ("history" === a.type ? "{{=i}}" : a.type + "{{=data.id}}") + ' {{= data.status === "offline" ? "layim-list-gray" : "" }}"><img src="{{= data.avatar || layui.layim.cache().base.defaultAvatar }}"><span>{{= data.username||data.groupname||data.name||"\u4f5a\u540d" }}</span><p>{{= data.remark||data.sign||"" }}</p><span class="layim-msg-status">new</span></li>', "{{# }); if(length === 0){ }}", '<li class="layim-null">' + ({
            friend: "\u8be5\u5206\u7ec4\u4e0b\u6682\u65e0\u597d\u53cb",
            group: "\u6682\u65e0\u7fa4\u7ec4",
            history: "\u6682\u65e0\u5386\u53f2\u4f1a\u8bdd"
        }[a.type] || "\u6682\u65e0\u6570\u636e") + "</li>", "{{# } }}"].join("")
    }
    function i(a) {
        return a < 10 ? "0" + (0 | a) : a
    }
    function c(a, i, e) {
        m.ajax({
            url: (a = a || {}).url,
            type: a.type || "get",
            data: a.data,
            dataType: a.dataType || "json",
            headers: a.headers || {},
            cache: !1,
            success: function(a) {
                0 == a.code ? i && i(a.data || {}) : f.msg(a.msg || (e || "Error") + ": LAYIM_NOT_GET_DATA", {
                    time: 5e3
                })
            },
            error: function(a, i) {
                window.console && console.log && console.error("LAYIM_DATE_ERROR\uff1a" + i)
            }
        })
    }
    function n() {
        var a = {
            username: C.mine ? C.mine.username : "\u8bbf\u5ba2",
            avatar: C.mine ? C.mine.avatar : C.base.defaultAvatar,
            id: C.mine ? C.mine.id : null,
            mine: !0
        }
          , i = z()
          , e = i.elem.find(".layim-chat-main ul")
          , t = C.base.maxLength || 3e3;
        if (a.content = i.textarea.val(),
        "" !== a.content.replace(/\s/g, "")) {
            if (a.content.length > t)
                return f.msg("\u5185\u5bb9\u6700\u957f\u4e0d\u80fd\u8d85\u8fc7" + t + "\u4e2a\u5b57\u7b26");
            e.append(p(w).render(a));
            var n = {
                mine: a,
                to: i.data
            }
              , t = {
                username: n.mine.username,
                avatar: n.mine.avatar || C.base.defaultAvatar,
                id: n.to.id,
                type: n.to.type,
                content: n.mine.content,
                timestamp: (new Date).getTime(),
                mine: !0
            };
            X(t),
            layui.each(b.sendMessage, function(a, i) {
                i && i(n)
            })
        }
        E(),
        i.textarea.val("").focus()
    }
    function l(a, i) {
        var e, t = a.value;
        a.focus(),
        document.selection ? (e = document.selection.createRange(),
        document.selection.empty(),
        e.text = i) : (e = [t.substring(0, a.selectionStart), i, t.substr(a.selectionEnd)],
        a.focus(),
        a.value = e.join(""))
    }
    var o, e, r, d, u, y, t = "3.9.9", m = layui.$, f = layui.layer, p = layui.laytpl, h = layui.device(), v = "layui-show", g = "layim-this", b = {}, _ = (a.prototype.config = function(a) {
        var e = [];
        if (layui.each(Array(5), function(a) {
            e.push(layui.cache.layimResPath + "skin/" + (a + 1) + ".jpg")
        }),
        (a = a || {}).skin = a.skin || [],
        layui.each(a.skin, function(a, i) {
            e.unshift(i)
        }),
        a.skin = e,
        a = m.extend({
            isfriend: !0,
            isgroup: !0,
            voice: "default.mp3",
            defaultAvatar: a.defaultAvatar || layui.cache.layimResPath + "images/default.png"
        }, a),
        window.JSON && window.JSON.parse)
            return D(a),
            this
    }
    ,
    a.prototype.on = function(a, i) {
        return "function" == typeof i && (b[a] ? b[a].push(i) : b[a] = [i]),
        this
    }
    ,
    a.prototype.cache = function() {
        return C
    }
    ,
    a.prototype.chat = function(a) {
        if (window.JSON && window.JSON.parse)
            return A(a),
            this
    }
    ,
    a.prototype.setChatMin = function() {
        return L(),
        this
    }
    ,
    a.prototype.setChatStatus = function(a) {
        var i = z();
        if (i)
            return i.elem.find(".layim-chat-status").html(a),
            this
    }
    ,
    a.prototype.getMessage = function(a) {
        return R(a),
        this
    }
    ,
    a.prototype.notice = function(a) {
        return V(a),
        this
    }
    ,
    a.prototype.add = function(a) {
        return T(a),
        this
    }
    ,
    a.prototype.setFriendGroup = function(a) {
        return T(a, "setGroup"),
        this
    }
    ,
    a.prototype.msgbox = function(a) {
        return U(a),
        this
    }
    ,
    a.prototype.addList = function(a) {
        return Z(a),
        this
    }
    ,
    a.prototype.removeList = function(a) {
        return Q(a),
        this
    }
    ,
    a.prototype.setFriendStatus = function(a, i) {
        m(".layim-friend" + a)["online" === i ? "removeClass" : "addClass"]("layim-list-gray")
    }
    ,
    a.prototype.content = function(a) {
        return layui.data.content(a)
    }
    ,
    ['<div class="layui-layim-main">', '<div class="layui-layim-info">', '<div class="layui-layim-user">{{= d.mine.username }}</div>', '<div class="layui-layim-status">', '{{# if(d.mine.status === "online"){ }}', '<span class="layui-icon layim-status-online" layim-event="status" lay-type="show">&#xe617;</span>', '{{# } else if(d.mine.status === "hide") { }}', '<span class="layui-icon layim-status-hide" layim-event="status" lay-type="show">&#xe60f;</span>', "{{# } }}", '<ul class="layui-anim layim-menu-box">', '<li {{=d.mine.status === "online" ? "class=layim-this" : ""}} layim-event="status" lay-type="online"><i class="layui-icon">&#xe605;</i><cite class="layui-icon layim-status-online">&#xe617;</cite>\u5728\u7ebf</li>', '<li {{=d.mine.status === "hide" ? "class=layim-this" : ""}} layim-event="status" lay-type="hide"><i class="layui-icon">&#xe605;</i><cite class="layui-icon layim-status-hide">&#xe60f;</cite>\u9690\u8eab</li>', "</ul>", "</div>", '<input class="layui-layim-remark" placeholder="\u7f16\u8f91\u7b7e\u540d" value="{{- d.mine.remark||d.mine.sign||"" }}">', "</div>", '<ul class="layui-unselect layui-layim-tab{{# if(!d.base.isfriend || !d.base.isgroup){ }}', " layim-tab-two", '{{# } }}">', '<li class="layui-icon', "{{# if(!d.base.isfriend){ }}", " layim-hide", "{{# } else { }}", " layim-this", "{{# } }}", '" title="\u8054\u7cfb\u4eba" layim-event="tab" lay-type="friend">&#xe612;</li>', '<li class="layui-icon', "{{# if(!d.base.isgroup){ }}", " layim-hide", "{{# } else if(!d.base.isfriend) { }}", " layim-this", "{{# } }}", '" title="\u7fa4\u7ec4" layim-event="tab" lay-type="group">&#xe613;</li>', '<li class="layui-icon" title="\u5386\u53f2\u4f1a\u8bdd" layim-event="tab" lay-type="history">&#xe611;</li>', "</ul>", '<ul class="layui-unselect layim-tab-content {{# if(d.base.isfriend){ }}layui-show{{# } }} layim-list-friend">', '{{# layui.each(d.friend, function(index, item){ var spread = d.local["spread"+index]; }}', "<li>", '<h5 layim-event="spread" lay-type="{{= spread }}"><i class="layui-icon">{{# if(spread === "true"){ }}&#xe61a;{{# } else {  }}&#xe602;{{# } }}</i><span>{{= item.groupname||"\u672a\u547d\u540d\u5206\u7ec4"+index }}</span><em>(<cite class="layim-count"> {{= (item.list||[]).length }}</cite>)</em></h5>', '<ul class="layui-layim-list {{# if(spread === "true"){ }}', " layui-show", '{{# } }}">', s({
        type: "friend",
        item: "item.list",
        index: "index"
    }), "</ul>", "</li>", "{{# }); if(d.friend.length === 0){ }}", '<li><ul class="layui-layim-list layui-show"><li class="layim-null">\u6682\u65e0\u8054\u7cfb\u4eba</li></ul>', "{{# } }}", "</ul>", '<ul class="layui-unselect layim-tab-content {{# if(!d.base.isfriend && d.base.isgroup){ }}layui-show{{# } }}">', "<li>", '<ul class="layui-layim-list layui-show layim-list-group">', s({
        type: "group"
    }), "</ul>", "</li>", "</ul>", '<ul class="layui-unselect layim-tab-content  {{# if(!d.base.isfriend && !d.base.isgroup){ }}layui-show{{# } }}">', "<li>", '<ul class="layui-layim-list layui-show layim-list-history">', s({
        type: "history"
    }), "</ul>", "</li>", "</ul>", '<ul class="layui-unselect layim-tab-content">', "<li>", '<ul class="layui-layim-list layui-show" id="layui-layim-search"></ul>', "</li>", "</ul>", '<ul class="layui-unselect layui-layim-tool">', '<li class="layui-icon layim-tool-search" layim-event="search" title="\u641c\u7d22">&#xe615;</li>', "{{# if(d.base.msgbox){ }}", '<li class="layui-icon layim-tool-msgbox" layim-event="msgbox" title="\u6d88\u606f\u76d2\u5b50">&#xe645;<span class="layui-anim"></span></li>', "{{# } }}", "{{# if(d.base.find){ }}", '<li class="layui-icon layim-tool-find" layim-event="find" title="\u67e5\u627e">&#xe608;</li>', "{{# } }}", '<li class="layui-icon layim-tool-skin" layim-event="skin" title="\u66f4\u6362\u80cc\u666f">&#xe61b;</li>', "{{# if(!d.base.copyright){ }}", '<li class="layui-icon layim-tool-about" layim-event="about" title="\u5173\u4e8e">&#xe60b;</li>', "{{# } }}", "</ul>", '<div class="layui-layim-search"><input><label class="layui-icon" layim-event="closeSearch">&#x1007;</label></div>', "</div>"].join("")), q = ['<ul class="layui-layim-skin">', "{{# layui.each(d.skin, function(index, item){ }}", '<li><img layim-event="setSkin" src="{{= item }}"></li>', "{{# }); }}", '<li layim-event="setSkin"><cite>\u7b80\u7ea6</cite></li>', "</ul>"].join(""), x = ['<div class="layim-chat layim-chat-{{=d.data.type}}{{=d.first ? " layui-show" : ""}}">', '<div class="layui-unselect layim-chat-title">', '<div class="layim-chat-other">', '<img class="layim-{{= d.data.type }}{{= d.data.id }}" src="{{= d.data.avatar || layui.layim.cache().base.defaultAvatar }}"><span class="layim-chat-username" layim-event="{{= d.data.type==="group" ? "groupMembers" : "" }}">{{= d.data.name||"\u4f5a\u540d" }} {{=d.data.temporary ? "<cite>\u4e34\u65f6\u4f1a\u8bdd</cite>" : ""}} {{# if(d.data.type==="group"){ }} <em class="layim-chat-members"></em><i class="layui-icon">&#xe61a;</i> {{# } }}</span>', '<span class="layim-chat-status"></span>', "</div>", "</div>", '<div class="layim-chat-main">', "<ul></ul>", "</div>", '<div class="layim-chat-footer">', '<div class="layui-unselect layim-chat-tool" data-json="{{=encodeURIComponent(JSON.stringify(d.data))}}">', '<span class="layui-icon layim-tool-face" title="\u9009\u62e9\u8868\u60c5" layim-event="face">&#xe60c;</span>', "{{# if(d.base && d.base.uploadImage){ }}", '<span class="layui-icon layim-tool-image" title="\u4e0a\u4f20\u56fe\u7247" layim-event="image">&#xe60d;<input type="file" name="file"></span>', "{{# }; }}", "{{# if(d.base && d.base.uploadFile){ }}", '<span class="layui-icon layim-tool-image" title="\u53d1\u9001\u6587\u4ef6" layim-event="image" data-type="file">&#xe61d;<input type="file" name="file"></span>', "{{# }; }}", "{{# if(d.base && d.base.isAudio){ }}", '<span class="layui-icon layim-tool-audio" title="\u53d1\u9001\u7f51\u7edc\u97f3\u9891" layim-event="media" data-type="audio">&#xe6fc;</span>', "{{# }; }}", "{{# if(d.base && d.base.isVideo){ }}", '<span class="layui-icon layim-tool-video" title="\u53d1\u9001\u7f51\u7edc\u89c6\u9891" layim-event="media" data-type="video">&#xe6ed;</span>', "{{# }; }}", "{{# layui.each(d.base.tool, function(index, item){ }}", '<span class="layui-icon layim-tool-{{=item.alias}}" title="{{=item.title}}" layim-event="extend" lay-filter="{{= item.alias }}">{{=item.icon}}</span>', "{{# }); }}", "{{# if(d.base && d.base.chatLog){ }}", '<span class="layim-tool-log" layim-event="chatLog"><i class="layui-icon">&#xe60e;</i>\u804a\u5929\u8bb0\u5f55</span>', "{{# }; }}", "</div>", '<div class="layim-chat-textarea"><textarea></textarea></div>', '<div class="layim-chat-bottom">', '<div class="layim-chat-send">', "{{# if(!d.base.brief){ }}", '<span class="layim-send-close" layim-event="closeThisChat">\u5173\u95ed</span>', "{{# } }}", '<span class="layim-send-btn" layim-event="send">\u53d1\u9001</span>', '<span class="layim-send-set" layim-event="setSend" lay-type="show"><i class="layui-icon layui-icon-down"></i></span>', '<ul class="layui-anim layim-menu-box">', '<li {{=d.local.sendHotKey !== "Ctrl+Enter" ? "class=layim-this" : ""}} layim-event="setSend" lay-type="Enter"><i class="layui-icon">&#xe605;</i>\u6309 Enter \u952e\u53d1\u9001\u6d88\u606f</li>', '<li {{=d.local.sendHotKey === "Ctrl+Enter" ? "class=layim-this" : ""}} layim-event="setSend"  lay-type="Ctrl+Enter"><i class="layui-icon">&#xe605;</i>\u6309 Ctrl+Enter \u952e\u53d1\u9001\u6d88\u606f</li>', "</ul>", "</div>", "</div>", "</div>", "</div>"].join(""), $ = ['<div class="layim-add-box">', '<div class="layim-add-img"><img class="layui-circle" src="{{= d.data.avatar || layui.layim.cache().base.defaultAvatar }}"><p>{{= d.data.name||"" }}</p></div>', '<div class="layim-add-remark">', '{{# if(d.data.type === "friend" && d.type === "setGroup"){ }}', "<p>\u9009\u62e9\u5206\u7ec4</p>", '{{# } if(d.data.type === "friend"){ }}', '<select class="layui-select" id="LAY_layimGroup">', "{{# layui.each(d.data.group, function(index, item){ }}", '<option value="{{= item.id }}">{{= item.groupname }}</option>', "{{# }); }}", "</select>", "{{# } }}", '{{# if(d.data.type === "group"){ }}', "<p>\u8bf7\u8f93\u5165\u9a8c\u8bc1\u4fe1\u606f</p>", '{{# } if(d.type !== "setGroup"){ }}', '<textarea id="LAY_layimRemark" placeholder="\u9a8c\u8bc1\u4fe1\u606f" class="layui-textarea"></textarea>', "{{# } }}", "</div>", "</div>"].join(""), w = ['<li {{= d.mine ? "class=layim-chat-mine" : "" }} {{# if(d.cid){ }}data-cid="{{=d.cid}}"{{# } }}>', '<div class="layim-chat-user"><img src="{{= d.avatar || layui.layim.cache().base.defaultAvatar }}"><cite>', "{{# if(d.mine){ }}", '<i>{{= layui.data.date(d.timestamp) }}</i>{{= d.username||"\u4f5a\u540d" }}', "{{# } else { }}", '{{= d.username||"\u4f5a\u540d" }}<i>{{= layui.data.date(d.timestamp) }}</i>', "{{# } }}", "</cite></div>", '<div class="layim-chat-text">{{- layui.data.content(d.content||"&nbsp") }}</div>', "</li>"].join(""), k = '<li class="layim-{{= d.data.type }}{{= d.data.id }} layim-chatlist-{{= d.data.type }}{{= d.data.id }} layim-this" layim-event="tabChat"><img src="{{= d.data.avatar || layui.layim.cache().base.defaultAvatar }}"><span>{{= d.data.name||"\u4f5a\u540d" }}</span>{{# if(!d.base.brief){ }}<i class="layui-icon" layim-event="closeChat">&#x1007;</i>{{# } }}</li>', C = (layui.data.date = function(a) {
        a = new Date(a || new Date);
        return a.getFullYear() + "-" + i(a.getMonth() + 1) + "-" + i(a.getDate()) + " " + i(a.getHours()) + ":" + i(a.getMinutes()) + ":" + i(a.getSeconds())
    }
    ,
    layui.data.content = function(a) {
        function i(a) {
            return new RegExp("\\n*\\[" + (a || "") + "(code|pre|div|span|p|table|thead|th|tbody|tr|td|ul|li|ol|li|dl|dt|dd|h2|h3|h4|h5)([\\s\\S]*?)\\]\\n*","g")
        }
        return a = (a || "").replace(/&(?!#?[a-zA-Z0-9]+;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&quot;").replace(/@(\S+)(\s+?|$)/g, '@<a href="javascript:;">$1</a>$2').replace(/img\[([^\s]+?)\]/g, function(a) {
            return '<img class="layui-layim-photos" src="' + a.replace(/(^img\[)|(\]$)/g, "") + '">'
        }).replace(/file\([\s\S]+?\)\[[\s\S]*?\]/g, function(a) {
            var i = (a.match(/file\(([\s\S]+?)\)\[/) || [])[1]
              , e = (a.match(/\)\[([\s\S]*?)\]/) || [])[1];
            return i ? '<a class="layui-layim-file" href="' + i + '" download target="_blank"><i class="layui-icon">&#xe61e;</i><cite>' + (e || i) + "</cite></a>" : a
        }).replace(/audio\[([^\s]+?)\]/g, function(a) {
            return '<div class="layui-unselect layui-layim-audio" layim-event="playAudio" data-src="' + a.replace(/(^audio\[)|(\]$)/g, "") + '"><i class="layui-icon">&#xe652;</i><p>\u97f3\u9891\u6d88\u606f</p></div>'
        }).replace(/video\[([^\s]+?)\]/g, function(a) {
            return '<div class="layui-unselect layui-layim-video" layim-event="playVideo" data-src="' + a.replace(/(^video\[)|(\]$)/g, "") + '"><i class="layui-icon">&#xe652;</i></div>'
        }).replace(/a\([\s\S]+?\)\[[\s\S]*?\]/g, function(a) {
            var i = (a.match(/a\(([\s\S]+?)\)\[/) || [])[1]
              , e = (a.match(/\)\[([\s\S]*?)\]/) || [])[1];
            return i ? '<a href="' + i + '" target="_blank">' + (e || i) + "</a>" : a
        }).replace(i(), "<$1 $2>").replace(i("/"), "</$1>").replace(/\n/g, "<br>")
    }
    ,
    {
        message: {},
        chat: []
    }), D = function(n) {
        var a = n.init || {};
        if (mine = a.mine || {},
        local = layui.data("layim")[mine.id] || {},
        obj = {
            base: n,
            local: local,
            mine: mine,
            history: local.history || {}
        },
        create = function(a) {
            var i = a.mine || {}
              , e = layui.data("layim")[i.id] || {}
              , t = {
                base: n,
                local: e,
                mine: i,
                friend: a.friend || [],
                group: a.group || [],
                history: e.history || {}
            };
            C = m.extend(C, t),
            J(p(_).render(t)),
            (e.close || n.min) && S(),
            layui.each(b.ready, function(a, i) {
                i && i(t)
            })
        }
        ,
        C = m.extend(C, obj),
        n.brief)
            return layui.each(b.ready, function(a, i) {
                i && i(obj)
            });
        a.url ? c(a, create, "INIT") : create(a)
    }, J = function(a) {
        return f.open({
            type: 1,
            area: ["260px", "518px"],
            skin: "layui-box layui-layim",
            title: "&#8203;",
            offset: "rb",
            id: "layui-layim",
            shade: !1,
            anim: 2,
            resize: !1,
            content: a,
            success: function(a) {
                P(o = a),
                C.base.right && a.css("margin-left", "-" + C.base.right),
                e && f.close(e.attr("times"));
                var i = []
                  , a = a.find(".layim-list-history");
                a.find("li").each(function() {
                    i.push(m(this).prop("outerHTML"))
                }),
                0 < i.length && (i.reverse(),
                a.html(i.join(""))),
                F(),
                N.sign()
            },
            cancel: function(a) {
                S();
                var i = layui.data("layim")[C.mine.id] || {};
                return i.close = !0,
                layui.data("layim", {
                    key: C.mine.id,
                    value: i
                }),
                !1
            }
        })
    }, F = function() {
        o.on("contextmenu", function(a) {
            return a.cancelBubble = !0,
            a.returnValue = !1
        });
        function t() {
            f.closeAll("tips")
        }
        o.find(".layim-list-history").on("contextmenu", "li", function(a) {
            var i = m(this)
              , e = '<ul data-id="' + i[0].id + '" data-index="' + i.data("index") + '"><li layim-event="menuHistory" data-type="one">\u79fb\u9664\u8be5\u4f1a\u8bdd</li><li layim-event="menuHistory" data-type="all">\u6e05\u7a7a\u5168\u90e8\u4f1a\u8bdd\u5217\u8868</li></ul>';
            i.hasClass("layim-null") || (f.tips(e, this, {
                tips: 1,
                time: 0,
                anim: 5,
                fixed: !0,
                skin: "layui-box layui-layim-contextmenu",
                success: function(a) {
                    function i(a) {
                        I(a)
                    }
                    a.off("mousedown", i).on("mousedown", i)
                }
            }),
            m(document).off("mousedown", t).on("mousedown", t),
            m(window).off("resize", t).on("resize", t))
        })
    }, S = function(a) {
        return e && f.close(e.attr("times")),
        o && o.hide(),
        C.mine = C.mine || {},
        f.open({
            type: 1,
            title: !1,
            id: "layui-layim-close",
            skin: "layui-box layui-layim-min layui-layim-close",
            shade: !1,
            closeBtn: !1,
            anim: 2,
            offset: "rb",
            resize: !1,
            content: '<img src="' + (C.mine.avatar || C.base.defaultAvatar) + '"><span>' + (a || C.base.title || "\u6211\u7684 IM") + "</span>",
            move: "#layui-layim-close img",
            success: function(a, i) {
                e = a,
                C.base.right && a.css("margin-left", "-" + C.base.right),
                a.on("click", function() {
                    f.close(i),
                    o.show();
                    var a = layui.data("layim")[C.mine.id] || {};
                    delete a.close,
                    layui.data("layim", {
                        key: C.mine.id,
                        value: a
                    })
                })
            }
        })
    }, A = function(t) {
        t = t || {};
        var a, i, e, n = m("#layui-layim-chat"), l = {
            data: t,
            base: C.base,
            local: C.local
        };
        if (!t.id)
            return f.msg("\u975e\u6cd5\u7528\u6237");
        if (n[0])
            return i = (a = r.find(".layim-chat-list")).find(".layim-chatlist-" + t.type + t.id),
            e = r.find(".layui-layer-max").hasClass("layui-layer-maxmin"),
            n = n.children(".layim-chat-box"),
            "none" === r.css("display") && r.show(),
            d && f.close(d.attr("times")),
            1 !== a.find("li").length || i[0] || (e || r.addClass("layui-layim-chat-more").css("width", 800),
            a.css({
                height: r.height()
            }).show(),
            n.css("margin-left", "200px"),
            u && u.offset()),
            i[0] || (a.append(p(k).render(l)),
            n.append(p(x).render(l)),
            G(t),
            H()),
            j(a.find(".layim-chatlist-" + t.type + t.id)),
            i[0] || W(),
            Y(t),
            aa(),
            y;
        l.first = !0;
        var s = y = f.open({
            type: 1,
            area: "600px",
            skin: "layui-box layui-layim-chat",
            id: "layui-layim-chat",
            title: "&#8203;",
            shade: !1,
            maxmin: !0,
            offset: t.offset || "auto",
            anim: t.anim || 0,
            closeBtn: !C.base.brief && 1,
            content: p('<ul class="layui-unselect layim-chat-list">' + k + '</ul><div class="layim-chat-box">' + x + "</div>").render(l),
            success: function(a, i, e) {
                u = e,
                (r = a).css({
                    "min-width": "500px",
                    "min-height": "450px"
                }),
                G(t),
                "function" == typeof t.success && t.success(a),
                aa(),
                P(a),
                Y(t),
                W(),
                K(),
                layui.each(b.chatChange, function(a, i) {
                    i && i(z())
                }),
                a.on("dblclick", ".layui-layim-photos", function() {
                    var a = this.src;
                    f.close(A.photosIndex),
                    f.photos({
                        photos: {
                            data: [{
                                alt: "\u5927\u56fe\u6a21\u5f0f",
                                src: a
                            }]
                        },
                        shade: .01,
                        closeBtn: 2,
                        anim: 0,
                        resize: !1,
                        success: function(a, i) {
                            A.photosIndex = i
                        }
                    })
                })
            },
            full: function(a) {
                f.style(s, {
                    width: "100%",
                    height: "100%"
                }, !0),
                H()
            },
            resizing: H,
            restore: H,
            min: function() {
                return L(),
                !1
            },
            end: function() {
                f.closeAll("tips"),
                r = null
            }
        });
        return s
    }, G = function(a) {
        m(".layim-" + a.type + a.id).each(function() {
            m(this).hasClass("layim-list-gray") && layui.layim.setFriendStatus(a.id, "offline")
        })
    }, H = function() {
        var a = r.find(".layim-chat-list")
          , i = r.find(".layim-chat-main")
          , e = r.height();
        a.css({
            height: e
        }),
        i.css({
            height: e - 52 - 158
        })
    }, L = function(e) {
        var a = e || z().data
          , t = layui.layim.cache().base;
        r && !e && r.hide(),
        f.close(L.index),
        L.index = f.open({
            type: 1,
            title: !1,
            skin: "layui-box layui-layim-min",
            shade: !1,
            closeBtn: !1,
            anim: a.anim || 2,
            offset: "b",
            move: "#layui-layim-min",
            resize: !1,
            area: ["182px", "52px"],
            content: '<img id="layui-layim-min" src="' + (a.avatar || C.base.defaultAvatar) + '"><span>' + a.name + "</span>",
            success: function(a, i) {
                e || (d = a),
                t.minRight && f.style(i, {
                    left: m(window).width() - a.outerWidth() - parseFloat(t.minRight)
                }),
                a.find(".layui-layer-content span").on("click", function() {
                    f.close(i),
                    e ? layui.each(C.chat, function(a, i) {
                        A(i)
                    }) : r.show(),
                    e && (C.chat = [],
                    E())
                }),
                a.find(".layui-layer-content img").on("click", function(a) {
                    I(a)
                })
            }
        })
    }, T = function(t, n) {
        return t = t || {},
        f.close(T.index),
        T.index = f.open({
            type: 1,
            area: "430px",
            title: {
                friend: "\u6dfb\u52a0\u597d\u53cb",
                group: "\u52a0\u5165\u7fa4\u7ec4"
            }[t.type] || "",
            shade: !1,
            resize: !1,
            btn: n ? ["\u786e\u8ba4", "\u53d6\u6d88"] : ["\u53d1\u9001\u7533\u8bf7", "\u5173\u95ed"],
            content: p($).render({
                data: {
                    name: t.username || t.groupname,
                    avatar: t.avatar || C.base.defaultAvatar,
                    group: t.group || parent.layui.layim.cache().friend || [],
                    type: t.type
                },
                type: n
            }),
            yes: function(a, i) {
                var e = i.find("#LAY_layimGroup")
                  , i = i.find("#LAY_layimRemark");
                n ? t.submit && t.submit(e.val(), a) : t.submit && t.submit(e.val(), i.val(), a)
            }
        })
    }, j = function(a, i) {
        var e = -1 === (a = a || m(".layim-chat-list ." + g)).index() ? 0 : a.index()
          , t = ".layim-chat"
          , n = r.find(t).eq(e)
          , l = r.find(".layui-layer-max").hasClass("layui-layer-maxmin");
        if (i)
            return a.hasClass(g) && j(0 === e ? a.next() : a.prev()),
            1 === (i = r.find(t).length) ? f.close(y) : (a.remove(),
            n.remove(),
            2 === i && (r.find(".layim-chat-list").hide(),
            l || r.removeClass("layui-layim-chat-more").css("width", "600px"),
            r.find(".layim-chat-box").css("margin-left", 0),
            u && u.offset()),
            !1);
        a.addClass(g).siblings().removeClass(g),
        n.addClass(v).siblings(t).removeClass(v),
        n.find("textarea").focus(),
        layui.each(b.chatChange, function(a, i) {
            i && i(z())
        }),
        K()
    }, K = function() {
        var a = z();
        C.message[a.data.type + a.data.id] && delete C.message[a.data.type + a.data.id]
    }, z = a.prototype.thisChat = function() {
        var a, i;
        if (r)
            return a = m(".layim-chat-list ." + g).index(),
            a = r.find(".layim-chat").eq(a),
            i = JSON.parse(decodeURIComponent(a.find(".layim-chat-tool").data("json"))),
            {
                elem: a,
                data: i,
                textarea: a.find("textarea")
            }
    }
    , P = function(a) {
        var i = (layui.data("layim")[C.mine.id] || {}).skin;
        a.css({
            "background-image": i ? "url(" + i + ")" : C.base.initSkin ? "url(" + layui.cache.layimResPath + "skin/" + C.base.initSkin + ")" : "none"
        })
    }, Y = function(a) {
        var i, e = layui.data("layim")[C.mine.id] || {}, t = {}, n = e.history || {}, l = n[a.type + a.id];
        o && (i = o.find(".layim-list-history"),
        a.historyTime = (new Date).getTime(),
        n[a.type + a.id] = a,
        e.history = n,
        layui.data("layim", {
            key: C.mine.id,
            value: e
        }),
        l || (t[a.type + a.id] = a,
        n = p(s({
            type: "history",
            item: "d.data"
        })).render({
            data: t
        }),
        i.prepend(n),
        i.find(".layim-null").remove()))
    }, V = function(a) {
        a = a || {},
        window.Notification && ("granted" === Notification.permission ? new Notification(a.title || "",{
            body: a.content || "",
            icon: a.avatar || C.base.defaultAvatar
        }) : Notification.requestPermission())
    }, R = function(e) {
        var t, n, a, i, l = m(".layim-chatlist-" + (e = e || {}).type + e.id), s = {}, o = l.index();
        if ((e.timestamp = e.timestamp || (new Date).getTime(),
        e.fromid == C.mine.id && (e.mine = !0),
        e.system || X(e),
        JSON.parse(JSON.stringify(e)),
        C.base.voice && (m("body").trigger("click"),
        R.init ? h.ie && h.ie < 9 || ((a = document.createElement("audio")).src = layui.cache.layimResPath + "voice/" + C.base.voice,
        a.play()) : R.init = !0),
        !r && e.content || -1 === o) && (C.message[e.type + e.id] ? C.message[e.type + e.id].push(e) : (C.message[e.type + e.id] = [e],
        "friend" === e.type ? (layui.each(C.friend, function(a, i) {
            if (layui.each(i.list, function(a, i) {
                if (i.id == e.id)
                    return i.type = "friend",
                    i.name = i.username,
                    C.chat.push(i),
                    t = !0
            }),
            t)
                return !0
        }),
        t || (e.name = e.username,
        e.temporary = !0,
        C.chat.push(e))) : "group" === e.type ? (layui.each(C.group, function(a, i) {
            if (i.id == e.id)
                return i.type = "group",
                i.name = i.groupname,
                C.chat.push(i),
                n = !0
        }),
        n || (e.name = e.groupname,
        C.chat.push(e))) : (e.name = e.name || e.username || e.groupname,
        C.chat.push(e))),
        "group" === e.type && layui.each(C.group, function(a, i) {
            if (i.id == e.id)
                return s.avatar = i.avatar || C.base.defaultAvatar,
                !0
        }),
        !e.system))
            return C.base.notice && V({
                title: "\u6765\u81ea " + e.username + " \u7684\u6d88\u606f",
                content: e.content,
                avatar: s.avatar || e.avatar || C.base.defaultAvatar
            }),
            L({
                name: "\u6536\u5230\u65b0\u6d88\u606f",
                avatar: s.avatar || e.avatar || C.base.defaultAvatar,
                anim: 6
            });
        r && ((a = z()).data.type + a.data.id !== e.type + e.id && (l.addClass("layui-anim layer-anim-06"),
        setTimeout(function() {
            l.removeClass("layui-anim layer-anim-06")
        }, 300)),
        i = r.find(".layim-chat").eq(o).find(".layim-chat-main ul"),
        e.system ? -1 !== o && i.append('<li class="layim-chat-system"><span>' + e.content + "</span></li>") : "" !== e.content.replace(/\s/g, "") && i.append(p(w).render(e)),
        E())
    }, B = "layui-anim-loop layer-anim-05", U = function(a) {
        o.find(".layim-tool-msgbox").find("span").addClass(B).html(a)
    }, X = function(e) {
        var t, a = layui.data("layim")[C.mine.id] || {}, i = (a.chatlog = a.chatlog || {},
        a.chatlog[e.type + e.id]);
        i ? (layui.each(i, function(a, i) {
            i.timestamp === e.timestamp && i.type === e.type && i.id === e.id && i.content === e.content && (t = !0)
        }),
        t || e.fromid == C.mine.id || i.push(e),
        20 < i.length && i.shift()) : a.chatlog[e.type + e.id] = [e],
        layui.data("layim", {
            key: C.mine.id,
            value: a
        })
    }, W = function() {
        var a = layui.data("layim")[C.mine.id] || {}
          , i = z()
          , a = a.chatlog || {}
          , e = i.elem.find(".layim-chat-main ul");
        layui.each(a[i.data.type + i.data.id], function(a, i) {
            e.append(p(w).render(i))
        }),
        E()
    }, Z = function(e) {
        var t, a, i, n = {}, l = o.find(".layim-list-" + e.type);
        if (C[e.type])
            if ("friend" === e.type)
                layui.each(C.friend, function(a, i) {
                    if (e.groupid == i.id)
                        return layui.each(C.friend[a].list, function(a, i) {
                            if (i.id == e.id)
                                return t = !0
                        }),
                        t ? f.msg("\u597d\u53cb [" + (e.username || "") + "] \u5df2\u7ecf\u5b58\u5728\u5217\u8868\u4e2d", {
                            anim: 6
                        }) : (C.friend[a].list = C.friend[a].list || [],
                        (n[C.friend[a].list.length] = e).groupIndex = a,
                        C.friend[a].list.push(e),
                        !0)
                });
            else if ("group" === e.type) {
                if (layui.each(C.group, function(a, i) {
                    if (i.id == e.id)
                        return t = !0
                }),
                t)
                    return f.msg("\u60a8\u5df2\u662f [" + (e.groupname || "") + "] \u7684\u7fa4\u6210\u5458", {
                        anim: 6
                    });
                n[C.group.length] = e,
                C.group.push(e)
            }
        t || (a = p(s({
            type: e.type,
            item: "d.data",
            index: "friend" === e.type ? "data.groupIndex" : null
        })).render({
            data: n
        }),
        "friend" === e.type ? ((i = l.find(">li").eq(e.groupIndex)).find(".layui-layim-list").append(a),
        i.find(".layim-count").html(C.friend[e.groupIndex].list.length),
        i.find(".layim-null")[0] && i.find(".layim-null").remove()) : "group" === e.type && (l.append(a),
        l.find(".layim-null")[0] && l.find(".layim-null").remove()))
    }, Q = function(t) {
        var n = o.find(".layim-list-" + t.type);
        C[t.type] && ("friend" === t.type ? layui.each(C.friend, function(e, a) {
            layui.each(a.list, function(a, i) {
                if (t.id == i.id)
                    return (i = n.find(">li").eq(e)).find(".layui-layim-list>li"),
                    i.find(".layui-layim-list>li").eq(a).remove(),
                    C.friend[e].list.splice(a, 1),
                    i.find(".layim-count").html(C.friend[e].list.length),
                    0 === C.friend[e].list.length && i.find(".layui-layim-list").html('<li class="layim-null">\u8be5\u5206\u7ec4\u4e0b\u5df2\u65e0\u597d\u53cb\u4e86</li>'),
                    !0
            })
        }) : "group" === t.type && layui.each(C.group, function(a, i) {
            if (t.id == i.id)
                return n.find(">li").eq(a).remove(),
                C.group.splice(a, 1),
                0 === C.group.length && n.html('<li class="layim-null">\u6682\u65e0\u7fa4\u7ec4</li>'),
                !0
        }))
    }, E = function() {
        var a, i = z().elem.find(".layim-chat-main"), e = i.find("ul"), t = e.find("li").length;
        20 <= t && (a = e.find("li").eq(0),
        e.prev().hasClass("layim-chat-system") || e.before('<div class="layim-chat-system"><span layim-event="chatLog">\u67e5\u770b\u66f4\u591a\u8bb0\u5f55</span></div>'),
        20 < t && a.remove()),
        i.scrollTop(i[0].scrollHeight + 1e3),
        i.find("ul li:last").find("img").on("load", function() {
            i.scrollTop(i[0].scrollHeight + 1e3)
        })
    }, aa = function() {
        var t = z().textarea;
        t.focus(),
        t.off("keydown").on("keydown", function(a) {
            var i = layui.data("layim")[C.mine.id] || {}
              , e = a.keyCode;
            if ("Ctrl+Enter" === i.sendHotKey)
                a.ctrlKey && 13 === e && n();
            else if (13 === e) {
                if (a.ctrlKey)
                    return t.val(t.val() + "\n");
                a.shiftKey || (a.preventDefault(),
                n())
            }
        })
    }, ia = {
        "\u543c\u543c": "^O^",
        "\u60ca\u8bb6": "w(\uff9f\u0414\uff9f)w",
        "\u4e0d\u5c51": " (\uffe3_,\uffe3 )",
        "\u597d\u8036": "\u30fd(\u273f\uff9f\u25bd\uff9f)\u30ce",
        "\u4eb2": "o(*\uffe33\uffe3)o",
        "\u68d2": "(\u0e51\u2022\u0300\u3142\u2022\u0301)\u0648\u2727",
        "\u6da8": "  (\uffe3\ufe36\uffe3)\u2197",
        "\u5f97\u610f": "<(\uffe3\ufe36\uffe3)>",
        "\u6316\u9f3b\u5b54": " (*\uffe3r\u01d2\uffe3)",
        "\u60ca": "\u2299\u02cd\u2299",
        "\u98de": "\ufe3f(\uffe3\ufe36\uffe3)\ufe3f",
        "\u54fc\u54fc": "o(\uffe3\u30d8\uffe3o\uff03)",
        "\u597d\u6ef4": " (u\u203f\u0e3au\u273f\u0e3a)",
        "\u554a\u554a": "\uff2f(\u2267\u53e3\u2266)\uff2f",
        "\u5566\u5566": "\u266a(^\u2207^*)",
        "\u60ca\u559c": "\u2570(*\xb0\u25bd\xb0*)\u256f",
        "\u4e56": " o(*^\uff20^*)o",
        "\u9676\u9189": "( *\ufe3e\u25bd\ufe3e)",
        "\u5582": " (#`O\u2032)",
        "\u6123\u4f4f": " (\xb0\u30fc\xb0\u3003)",
        "\u653e\u5c41": " \u25cb|\uffe3|_ =3",
        "\u53ef\u6076": "\uff08\uff1d\u3002\uff1d\uff09",
        "\u751f\u6c14": " (\u30fc`\u2032\u30fc)",
        "\u6ee1\u8db3": " o(*\uffe3\ufe36\uffe3*)o",
        "\u5d29\u6e83": "o(\u2267\u53e3\u2266)o",
        "\u5443\u5443\u5443": "(\u2299\ufe4f\u2299)",
        "\u6655": "X\ufe4fX",
        "\u5446": " \u2501\u2533\u2501\u3000\u2501\u2533\u2501",
        "\u55b5\u661f\u4eba": " ( =\u2022\u03c9\u2022= )m",
        "\u55b5\u545c": " \u2261\u03c9\u2261",
        "\u718a": "(*\uffe3(\u30a8)\uffe3)",
        "\u5bb3\u7f9e": " (\u273f\u25e1\u203f\u25e1)",
        good: " o(\uffe3\u25bd\uffe3)\uff44",
        "\u53ef\u7231": "*\uff3e-\uff3e*",
        "\u7206\u7b11": "\u30fe(\u2267\u25bd\u2266*)o",
        "\u5356\u840c": "=\uffe3\u03c9\uffe3="
    }, I = layui.stope, M = "layui-anim-upbit", N = {
        status: function(a, i) {
            function e() {
                a.next().hide().removeClass(M)
            }
            var t = a.attr("lay-type");
            "show" === t ? (I(i),
            a.next().show().addClass(M),
            m(document).off("click", e).on("click", e)) : (i = a.parent().prev(),
            a.addClass(g).siblings().removeClass(g),
            i.html(a.find("cite").html()),
            i.removeClass("layim-status-" + ("online" === t ? "hide" : "online")).addClass("layim-status-" + t),
            layui.each(b.online, function(a, i) {
                i && i(t)
            }))
        },
        sign: function() {
            var a = o.find(".layui-layim-remark");
            a.on("change", function() {
                var e = this.value;
                layui.each(b.sign, function(a, i) {
                    i && i(e)
                })
            }),
            a.on("keyup", function(a) {
                13 === a.keyCode && this.blur()
            })
        },
        tab: function(a) {
            var i, e = ".layim-tab-content", t = o.find(".layui-layim-tab>li");
            "number" == typeof a ? (i = a,
            a = t.eq(i)) : i = a.index(),
            2 < i ? t.removeClass(g) : (N.tab.index = i,
            a.addClass(g).siblings().removeClass(g)),
            o.find(e).eq(i).addClass(v).siblings(e).removeClass(v)
        },
        spread: function(a) {
            var i = a.attr("lay-type")
              , e = "true" === i ? "false" : "true"
              , t = layui.data("layim")[C.mine.id] || {};
            a.next()["true" === i ? "removeClass" : "addClass"](v),
            t["spread" + a.parent().index()] = e,
            layui.data("layim", {
                key: C.mine.id,
                value: t
            }),
            a.attr("lay-type", e),
            a.find(".layui-icon").html("true" == e ? "&#xe61a;" : "&#xe602;")
        },
        search: function(a) {
            function i(a) {
                var i = r.val().replace(/\s/);
                if ("" === i)
                    N.tab(0 | N.tab.index);
                else {
                    for (var e = [], t = C.friend || [], n = C.group || [], l = "", s = 0; s < t.length; s++)
                        for (var o = 0; o < (t[s].list || []).length; o++)
                            -1 !== t[s].list[o].username.indexOf(i) && (t[s].list[o].type = "friend",
                            t[s].list[o].index = s,
                            t[s].list[o].list = o,
                            e.push(t[s].list[o]));
                    for (var d = 0; d < n.length; d++)
                        -1 !== n[d].groupname.indexOf(i) && (n[d].type = "group",
                        n[d].index = d,
                        n[d].list = d,
                        e.push(n[d]));
                    if (0 < e.length)
                        for (var u = 0; u < e.length; u++)
                            l += '<li layim-event="chat" data-type="' + e[u].type + '" data-index="' + e[u].index + '" data-list="' + e[u].list + '"><img src="' + (e[u].avatar || C.base.defaultAvatar) + '"><span>' + (e[u].username || e[u].groupname || "\u4f5a\u540d") + "</span><p>" + (e[u].remark || e[u].sign || "") + "</p></li>";
                    else
                        l = '<li class="layim-null">\u65e0\u641c\u7d22\u7ed3\u679c</li>';
                    c.html(l),
                    N.tab(3)
                }
            }
            var e = o.find(".layui-layim-search")
              , c = o.find("#layui-layim-search")
              , r = e.find("input");
            !C.base.isfriend && C.base.isgroup ? N.tab.index = 1 : C.base.isfriend || C.base.isgroup || (N.tab.index = 2),
            e.show(),
            r.focus(),
            r.off("keyup", i).on("keyup", i)
        },
        closeSearch: function(a) {
            a.parent().hide(),
            N.tab(0 | N.tab.index)
        },
        msgbox: function() {
            var a = o.find(".layim-tool-msgbox");
            return f.close(N.msgbox.index),
            a.find("span").removeClass(B).html(""),
            N.msgbox.index = f.open({
                type: 2,
                title: "\u6d88\u606f\u76d2\u5b50",
                shade: !1,
                maxmin: !0,
                area: ["600px", "518px"],
                skin: "layui-box layui-layer-border",
                resize: !1,
                content: C.base.msgbox
            })
        },
        find: function() {
            return f.close(N.find.index),
            N.find.index = f.open({
                type: 2,
                title: "\u67e5\u627e",
                shade: !1,
                maxmin: !0,
                area: ["1000px", "518px"],
                skin: "layui-box layui-layer-border",
                resize: !1,
                content: C.base.find
            })
        },
        skin: function() {
            f.open({
                type: 1,
                title: "\u66f4\u6362\u80cc\u666f",
                shade: !1,
                area: "300px",
                skin: "layui-box layui-layer-border",
                id: "layui-layim-skin",
                zIndex: 66666666,
                resize: !1,
                content: p(q).render({
                    skin: C.base.skin
                })
            })
        },
        about: function() {
            f.alert("\u7248\u672c\uff1a v" + t, {
                title: "\u5173\u4e8e",
                shade: !1
            })
        },
        setSkin: function(a) {
            var t = a.attr("src")
              , a = layui.data("layim")[C.mine.id] || {};
            (a.skin = t) || delete a.skin,
            layui.data("layim", {
                key: C.mine.id,
                value: a
            });
            try {
                o.css({
                    "background-image": t ? "url(" + t + ")" : "none"
                }),
                r.css({
                    "background-image": t ? "url(" + t + ")" : "none"
                })
            } catch (a) {}
            layui.each(b.setSkin, function(a, i) {
                var e = (t || "").replace(layui.cache.layimResPath + "skin/", "");
                i && i(e, t)
            })
        },
        chat: function(a) {
            var i = layui.data("layim")[C.mine.id] || {}
              , e = a.data("type")
              , t = a.data("index")
              , a = a.attr("data-list") || a.index()
              , n = {};
            "friend" === e ? n = C[e][t].list[a] : "group" === e ? n = C[e][a] : "history" === e && (n = (i.history || {})[t] || {}),
            n.name = n.name || n.username || n.groupname,
            "history" !== e && (n.type = e),
            A(n)
        },
        tabChat: function(a) {
            j(a)
        },
        closeChat: function(a, i) {
            j(a.parent(), 1),
            I(i)
        },
        closeThisChat: function() {
            j(null, 1)
        },
        groupMembers: function(d, a) {
            function u() {
                e.html("&#xe61a;"),
                d.data("down", null),
                f.close(N.groupMembers.index)
            }
            function i(a) {
                I(a)
            }
            var e = d.find(".layui-icon");
            d.data("down") ? u() : (e.html("&#xe619;"),
            d.data("down", !0),
            N.groupMembers.index = f.tips('<ul class="layim-members-list"></ul>', d, {
                tips: 3,
                time: 0,
                anim: 5,
                fixed: !0,
                skin: "layui-box layui-layim-members",
                success: function(a) {
                    var i = C.base.members || {}
                      , e = z()
                      , t = a.find(".layim-members-list")
                      , n = ""
                      , l = {}
                      , s = r.find(".layui-layer-max").hasClass("layui-layer-maxmin")
                      , o = "none" === r.find(".layim-chat-list").css("display");
                    s && t.css({
                        width: m(window).width() - 22 - (o || 200)
                    }),
                    i.data = m.extend(i.data, {
                        id: e.data.id
                    }),
                    c(i, function(e) {
                        layui.each(e.list, function(a, i) {
                            n += '<li data-uid="' + i.id + '"><a href="javascript:;"><img src="' + (i.avatar || C.base.defaultAvatar) + '"><cite>' + i.username + "</cite></a></li>",
                            l[i.id] = i
                        }),
                        t.html(n),
                        d.find(".layim-chat-members").html(e.members || (e.list || []).length + "\u4eba"),
                        t.find("li").on("click", function() {
                            var a = m(this).data("uid")
                              , a = l[a];
                            A({
                                name: a.username,
                                type: "friend",
                                avatar: a.avatar || C.base.defaultAvatar,
                                id: a.id
                            }),
                            u()
                        }),
                        layui.each(b.members, function(a, i) {
                            i && i(e)
                        })
                    }),
                    a.on("mousedown", function(a) {
                        I(a)
                    })
                }
            }),
            m(document).off("mousedown", u).on("mousedown", u),
            m(window).off("resize", u).on("resize", u),
            d.off("mousedown", i).on("mousedown", i))
        },
        send: function() {
            n()
        },
        setSend: function(a, i) {
            var e = N.setSend.box = a.siblings(".layim-menu-box")
              , t = a.attr("lay-type");
            "show" === t ? (I(i),
            e.show().addClass(M),
            m(document).off("click", N.setSendHide).on("click", N.setSendHide)) : (a.addClass(g).siblings().removeClass(g),
            (e = layui.data("layim")[C.mine.id] || {}).sendHotKey = t,
            layui.data("layim", {
                key: C.mine.id,
                value: e
            }),
            N.setSendHide(i, a.parent()))
        },
        setSendHide: function(a, i) {
            (i || N.setSend.box).hide().removeClass(M)
        },
        face: function(a, i) {
            var e, t = "", n = z();
            for (e in ia)
                t += '<li title="' + e + '">' + ia[e] + "</li>";
            N.face.index = f.tips(t = '<ul class="layui-clear layim-face-list">' + t + "</ul>", a, {
                tips: 1,
                time: 0,
                fixed: !0,
                skin: "layui-box layui-layim-face",
                success: function(a) {
                    a.find(".layim-face-list>li").on("mousedown", function(a) {
                        I(a)
                    }).on("click", function() {
                        l(n.textarea[0], this.innerHTML + " "),
                        f.close(N.face.index)
                    })
                }
            }),
            m(document).off("mousedown", N.faceHide).on("mousedown", N.faceHide),
            m(window).off("resize", N.faceHide).on("resize", N.faceHide),
            I(i)
        },
        faceHide: function() {
            f.close(N.face.index)
        },
        image: function(a) {
            var i = a.data("type") || "images"
              , e = z()
              , t = C.base[{
                images: "uploadImage",
                file: "uploadFile"
            }[i]] || {};
            layui.upload.render({
                url: t.url || "",
                method: t.type,
                elem: a.find("input")[0],
                accept: i,
                done: function(a) {
                    0 == a.code ? (a.data = a.data || {},
                    "images" === i ? l(e.textarea[0], "img[" + (a.data.src || "") + "]") : "file" === i && l(e.textarea[0], "file(" + (a.data.src || "") + ")[" + (a.data.name || "\u4e0b\u8f7d\u6587\u4ef6") + "]"),
                    n()) : f.msg(a.msg || "\u4e0a\u4f20\u5931\u8d25")
                }
            })
        },
        media: function(a) {
            var e = a.data("type")
              , t = z();
            f.prompt({
                title: "\u8bf7\u8f93\u5165\u7f51\u7edc" + {
                    audio: "\u97f3\u9891",
                    video: "\u89c6\u9891"
                }[e] + "\u5730\u5740",
                shade: !1,
                offset: [a.offset().top - m(window).scrollTop() - 158 + "px", a.offset().left + "px"]
            }, function(a, i) {
                l(t.textarea[0], e + "[" + a + "]"),
                n(),
                f.close(i)
            })
        },
        extend: function(e) {
            var a = e.attr("lay-filter")
              , t = z();
            layui.each(b["tool(" + a + ")"], function(a, i) {
                i && i.call(e, function(a) {
                    l(t.textarea[0], a)
                }, n, t)
            })
        },
        playAudio: function(a) {
            function i() {
                t.pause(),
                a.removeAttr("status"),
                a.find("i").html("&#xe652;")
            }
            var e = a.data("audio")
              , t = e || document.createElement("audio");
            return a.data("error") ? f.msg("\u64ad\u653e\u97f3\u9891\u6e90\u5f02\u5e38") : t.play ? void (a.attr("status") ? i() : (e || (t.src = a.data("src")),
            t.play(),
            a.attr("status", "pause"),
            a.data("audio", t),
            a.find("i").html("&#xe651;"),
            t.onended = function() {
                i()
            }
            ,
            t.onerror = function() {
                f.msg("\u64ad\u653e\u97f3\u9891\u6e90\u5f02\u5e38"),
                a.data("error", !0),
                i()
            }
            )) : f.msg("\u60a8\u7684\u6d4f\u89c8\u5668\u4e0d\u652f\u6301audio")
        },
        playVideo: function(a) {
            a = a.data("src");
            if (!document.createElement("video").play)
                return f.msg("\u60a8\u7684\u6d4f\u89c8\u5668\u4e0d\u652f\u6301video");
            f.close(N.playVideo.index),
            N.playVideo.index = f.open({
                type: 1,
                title: "\u64ad\u653e\u89c6\u9891",
                area: ["460px", "300px"],
                maxmin: !0,
                shade: !1,
                content: '<div style="background-color: #000; height: 100%;"><video style="position: absolute; width: 100%; height: 100%;" src="' + a + '" loop="loop" autoplay="autoplay"></video></div>'
            })
        },
        chatLog: function(a) {
            var i = z();
            return C.base.chatLog ? (f.close(N.chatLog.index),
            N.chatLog.index = f.open({
                type: 2,
                maxmin: !0,
                title: "\u4e0e " + i.data.name + " \u7684\u804a\u5929\u8bb0\u5f55",
                area: ["450px", "100%"],
                shade: !1,
                offset: "rb",
                skin: "layui-box",
                anim: 2,
                id: "layui-layim-chatlog",
                content: C.base.chatLog + "?id=" + i.data.id + "&type=" + i.data.type
            })) : f.msg("\u672a\u5f00\u542f\u66f4\u591a\u804a\u5929\u8bb0\u5f55")
        },
        menuHistory: function(a, i) {
            var e, t = layui.data("layim")[C.mine.id] || {}, n = a.parent(), a = a.data("type"), l = o.find(".layim-list-history"), s = '<li class="layim-null">\u6682\u65e0\u5386\u53f2\u4f1a\u8bdd</li>';
            "one" === a ? (delete (e = t.history)[n.data("index")],
            t.history = e,
            layui.data("layim", {
                key: C.mine.id,
                value: t
            }),
            m(".layim-list-history li.layim-" + n.data("index")).remove(),
            0 === l.find("li").length && l.html(s)) : "all" === a && (delete t.history,
            layui.data("layim", {
                key: C.mine.id,
                value: t
            }),
            l.html(s)),
            f.closeAll("tips")
        }
    };
    O("layim", new a)
}).link(layui.cache.layimResPath + "layim.css", "skinlayimcss");
