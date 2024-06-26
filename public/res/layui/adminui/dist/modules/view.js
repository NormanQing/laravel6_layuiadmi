/** The Web UI Theme-v2.5.1 */
;layui.define(["laytpl", "layer"], function(e) {
    function u(e) {
        return new t(e)
    }
    function t(e) {
        this.id = e,
        this.container = c("#" + (e || a))
    }
    var c = layui.jquery
      , p = layui.laytpl
      , r = layui.layer
      , s = layui.setter
      , y = (layui.device(),
    layui.hint())
      , a = "LAY_app_body";
    u.loading = function(e) {
        e.append(this.elemLoad = c('<i class="layui-anim layui-anim-rotate layui-anim-loop layui-icon layui-icon-loading layadmin-loading"></i>'))
    }
    ,
    u.removeLoad = function() {
        this.elemLoad && this.elemLoad.remove()
    }
    ,
    u.exit = function(e) {
        layui.data(s.tableName, {
            key: s.request.tokenName,
            remove: !0
        }),
        e && e()
    }
    ,
    u.req = function(a) {
        function n() {
            return s.debug ? "<br><cite>URL\uff1a</cite>" + a.url : ""
        }
        var e, r = a.success, o = a.error, t = s.request, i = s.response;
        return a.data = a.data || {},
        a.headers = a.headers || {},
        t.tokenName && (e = "string" == typeof a.data ? JSON.parse(a.data) : a.data,
        a.data[t.tokenName] = t.tokenName in e ? a.data[t.tokenName] : layui.data(s.tableName)[t.tokenName] || "",
        a.headers[t.tokenName] = t.tokenName in a.headers ? a.headers[t.tokenName] : layui.data(s.tableName)[t.tokenName] || ""),
        delete a.success,
        delete a.error,
        c.ajax(c.extend({
            type: "get",
            dataType: "json",
            success: function(e) {
                var t = i.statusCode;
                e[i.statusName] == t.ok ? "function" == typeof a.done && a.done(e) : e[i.statusName] == t.logout ? u.exit() : (t = ["<cite>Error\uff1a</cite> " + (e[i.msgName] || "\u8fd4\u56de\u72b6\u6001\u7801\u5f02\u5e38"), n()].join(""),
                u.error(t)),
                "function" == typeof r && r(e)
            },
            error: function(e, t) {
                var a = ["\u8bf7\u6c42\u5f02\u5e38\uff0c\u8bf7\u91cd\u8bd5<br><cite>\u9519\u8bef\u4fe1\u606f\uff1a</cite>" + t, n()].join("");
                u.error(a),
                "function" == typeof o && o.apply(this, arguments)
            }
        }, a))
    }
    ,
    u.popup = function(e) {
        var n = e.success
          , t = e.skin;
        return delete e.success,
        delete e.skin,
        r.open(c.extend({
            type: 1,
            title: "\u63d0\u793a",
            content: "",
            id: "LAY-system-view-popup",
            skin: "layui-layer-admin" + (t ? " " + t : ""),
            shadeClose: !0,
            closeBtn: !1,
            success: function(e, t) {
                var a = c('<i class="layui-icon" close>&#x1006;</i>');
                e.append(a),
                a.on("click", function() {
                    r.close(t)
                }),
                "function" == typeof n && n.apply(this, arguments)
            }
        }, e))
    }
    ,
    u.error = function(e, t) {
        return u.popup(c.extend({
            content: e,
            maxWidth: 300,
            offset: "t",
            anim: 6,
            id: "LAY_adminError"
        }, t))
    }
    ,
    t.prototype.render = function(e, n) {
        var r = this;
        layui.router();
        return e = (s.paths && s.paths.views ? s.paths : s).views + e + s.engine,
        c("#" + a).children(".layadmin-loading").remove(),
        u.loading(r.container),
        c.ajax({
            url: e,
            type: "get",
            dataType: "html",
            data: {
                v: layui.cache.version
            },
            success: function(e) {
                var t = c(e = "<div>" + e + "</div>").find("title")
                  , a = {
                    title: t.text() || (e.match(/\<title\>([\s\S]*)\<\/title>/) || [])[1],
                    body: e
                };
                t.remove(),
                r.params = n || {},
                r.then && (r.then(a),
                delete r.then),
                r.parse(e),
                u.removeLoad(),
                r.done && (r.done(a),
                delete r.done)
            },
            error: function(e) {
                if (u.removeLoad(),
                r.render.isError)
                    return u.error("\u8bf7\u6c42\u89c6\u56fe\u6587\u4ef6\u5f02\u5e38\uff0c\u72b6\u6001\uff1a" + e.status);
                404 === e.status ? r.render("template/tips/404") : r.render("template/tips/error"),
                r.render.isError = !0
            }
        }),
        r
    }
    ,
    t.prototype.parse = function(e, t, n) {
        function o(t) {
            var e = p(t.dataElem.html())
              , a = c.extend({
                params: d.params
            }, t.res);
            t.dataElem.after(e.render(a)),
            "function" == typeof n && n();
            try {
                t.done && new Function("d",t.done)(a)
            } catch (e) {
                console.error(t.dataElem[0], "\n\u5b58\u5728\u9519\u8bef\u56de\u8c03\u811a\u672c\n\n", e)
            }
        }
        var a = this
          , r = "object" == typeof e
          , i = r ? e : c(e)
          , s = r ? e : i.find("*[template]")
          , d = layui.router();
        i.find("title").remove(),
        a.container[t ? "after" : "html"](i.children()),
        d.params = a.params || {};
        for (var l = s.length; 0 < l; l--)
            !function() {
                var t = s.eq(l - 1)
                  , a = t.attr("lay-done") || t.attr("lay-then")
                  , e = p(t.attr("lay-url") || "").render(d)
                  , n = p(t.attr("lay-data") || "").render(d)
                  , r = p(t.attr("lay-headers") || "").render(d);
                try {
                    n = new Function("return " + n + ";")()
                } catch (e) {
                    y.error("lay-data: " + e.message),
                    n = {}
                }
                try {
                    r = new Function("return " + r + ";")()
                } catch (e) {
                    y.error("lay-headers: " + e.message),
                    r = r || {}
                }
                e ? u.req({
                    type: t.attr("lay-type") || "get",
                    url: e,
                    data: n,
                    dataType: "json",
                    headers: r,
                    success: function(e) {
                        o({
                            dataElem: t,
                            res: e,
                            done: a
                        })
                    }
                }) : o({
                    dataElem: t,
                    done: a
                })
            }();
        return a
    }
    ,
    t.prototype.autoRender = function(e, t) {
        var n = this;
        c(e || "body").find("*[template]").each(function(e, t) {
            var a = c(this);
            n.container = a,
            n.parse(a, "refresh")
        })
    }
    ,
    t.prototype.send = function(e, t) {
        e = p(e || this.container.html()).render(t || {});
        return this.container.html(e),
        this
    }
    ,
    t.prototype.refresh = function(e) {
        var t = this
          , a = t.container.next().attr("lay-templateid");
        return t.id != a || t.parse(t.container, "refresh", function() {
            t.container.siblings('[lay-templateid="' + t.id + '"]:last').remove(),
            "function" == typeof e && e()
        }),
        t
    }
    ,
    t.prototype.then = function(e) {
        return this.then = e,
        this
    }
    ,
    t.prototype.done = function(e) {
        return this.done = e,
        this
    }
    ,
    e("view", u)
});
