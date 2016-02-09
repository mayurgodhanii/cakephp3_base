function glitterCallAlert(t, e, i, r, o) {
    "undefined" == typeof i && (i = 5e3), "undefined" == typeof r && (r = 500), "undefined" == typeof o && (o = "my-sticky-class"), setTimeout(function () {
        var r = $.gritter.add({title: t, text: e, sticky: !0, time: "", class_name: o});
        setTimeout(function () {
            $.gritter.remove(r, {fade: !0, speed: "slow"})
        }, i)
    }, r)
}
!function (t) {
    t.gritter = {}, t.gritter.options = {position: "", class_name: "", fade_in_speed: "medium", fade_out_speed: 1e3, time: 6e3}, t.gritter.add = function (t) {
        try {
            return e.add(t || {})
        } catch (i) {
            var r = "Gritter Error: " + i;
            "undefined" != typeof console && console.error ? console.error(r, t) : alert(r)
        }
    }, t.gritter.remove = function (t, i) {
        e.removeSpecific(t, i || {})
    }, t.gritter.removeAll = function (t) {
        e.stop(t || {})
    };
    var e = {position: "", fade_in_speed: "", fade_out_speed: "", time: "", _custom_timer: 0, _item_count: 0, _is_setup: 0, _tpl_close: '<a class="gritter-close" href="#" tabindex="1">Close Notification</a>', _tpl_title: '<span class="gritter-title">[[title]]</span>', _tpl_item: '<div id="gritter-item-[[number]]" class="gritter-item-wrapper [[item_class]]" style="display:none" role="alert"><div class="gritter-top"></div><div class="gritter-item">[[close]][[image]]<div class="[[class_name]]">[[title]]<p>[[text]]</p></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div>', _tpl_wrap: '<div id="gritter-notice-wrapper"></div>', add: function (i) {
            if ("string" == typeof i && (i = {text: i}), null === i.text)
                throw'You must supply "text" parameter.';
            this._is_setup || this._runSetup();
            var r = i.title, o = i.text, n = i.image || "", s = i.sticky || !1, a = i.class_name || t.gritter.options.class_name, c = t.gritter.options.position, _ = i.time || "";
            this._verifyWrapper(), this._item_count++;
            var p = this._item_count, l = this._tpl_item;
            t(["before_open", "after_open", "before_close", "after_close"]).each(function (r, o) {
                e["_" + o + "_" + p] = t.isFunction(i[o]) ? i[o] : function () {
                }
            }), this._custom_timer = 0, _ && (this._custom_timer = _);
            var f = "" != n ? '<img src="' + n + '" class="gritter-image" />' : "", u = "" != n ? "gritter-with-image" : "gritter-without-image";
            if (r = r ? this._str_replace("[[title]]", r, this._tpl_title) : "", l = this._str_replace(["[[title]]", "[[text]]", "[[close]]", "[[image]]", "[[number]]", "[[class_name]]", "[[item_class]]"], [r, o, this._tpl_close, f, this._item_count, u, a], l), this["_before_open_" + p]() === !1)
                return!1;
            t("#gritter-notice-wrapper").addClass(c).append(l);
            var d = t("#gritter-item-" + this._item_count);
            return d.fadeIn(this.fade_in_speed, function () {
                e["_after_open_" + p](t(this))
            }), s || this._setFadeTimer(d, p), t(d).bind("mouseenter mouseleave", function (i) {
                "mouseenter" == i.type ? s || e._restoreItemIfFading(t(this), p) : s || e._setFadeTimer(t(this), p), e._hoverState(t(this), i.type)
            }), t(d).find(".gritter-close").click(function () {
                return e.removeSpecific(p, {}, null, !0), !1
            }), p
        }, _countRemoveWrapper: function (e, i, r) {
            i.remove(), this["_after_close_" + e](i, r), 0 == t(".gritter-item-wrapper").length && t("#gritter-notice-wrapper").remove()
        }, _fade: function (t, i, r, o) {
            var r = r || {}, n = "undefined" != typeof r.fade ? r.fade : !0, s = r.speed || this.fade_out_speed, a = o;
            this["_before_close_" + i](t, a), o && t.unbind("mouseenter mouseleave"), n ? t.animate({opacity: 0}, s, function () {
                t.animate({height: 0}, 300, function () {
                    e._countRemoveWrapper(i, t, a)
                })
            }) : this._countRemoveWrapper(i, t)
        }, _hoverState: function (t, e) {
            "mouseenter" == e ? (t.addClass("hover"), t.find(".gritter-close").show()) : (t.removeClass("hover"), t.find(".gritter-close").hide())
        }, removeSpecific: function (e, i, r, o) {
            if (!r)
                var r = t("#gritter-item-" + e);
            this._fade(r, e, i || {}, o)
        }, _restoreItemIfFading: function (t, e) {
            clearTimeout(this["_int_id_" + e]), t.stop().css({opacity: "", height: ""})
        }, _runSetup: function () {
            for (opt in t.gritter.options)
                this[opt] = t.gritter.options[opt];
            this._is_setup = 1
        }, _setFadeTimer: function (t, i) {
            var r = this._custom_timer ? this._custom_timer : this.time;
            this["_int_id_" + i] = setTimeout(function () {
                e._fade(t, i)
            }, r)
        }, stop: function (e) {
            var i = t.isFunction(e.before_close) ? e.before_close : function () {
            }, r = t.isFunction(e.after_close) ? e.after_close : function () {
            }, o = t("#gritter-notice-wrapper");
            i(o), o.fadeOut(function () {
                t(this).remove(), r()
            })
        }, _str_replace: function (t, e, i, r) {
            var o = 0, n = 0, s = "", a = "", c = 0, _ = 0, p = [].concat(t), l = [].concat(e), f = i, u = l instanceof Array, d = f instanceof Array;
            for (f = [].concat(f), r && (this.window[r] = 0), o = 0, c = f.length; c > o; o++)
                if ("" !== f[o])
                    for (n = 0, _ = p.length; _ > n; n++)
                        s = f[o] + "", a = u ? void 0 !== l[n] ? l[n] : "" : l[0], f[o] = s.split(p[n]).join(a), r && f[o] !== s && (this.window[r] += (s.length - f[o].length) / p[n].length);
            return d ? f : f[0]
        }, _verifyWrapper: function () {
            0 == t("#gritter-notice-wrapper").length && t("body").append(this._tpl_wrap)
        }}
}(jQuery);