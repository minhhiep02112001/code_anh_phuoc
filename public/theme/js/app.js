!(function (e, t) {
    "object" == typeof module && "object" == typeof module.exports
        ? (module.exports = e.document
              ? t(e, !0)
              : function (e) {
                    if (!e.document)
                        throw new Error(
                            "jQuery requires a window with a document"
                        );
                    return t(e);
                })
        : t(e);
})("undefined" != typeof window ? window : this, function (h, e) {
    function t(e, t) {
        return t.toUpperCase();
    }
    var u = [],
        d = u.slice,
        m = u.concat,
        a = u.push,
        o = u.indexOf,
        n = {},
        i = n.toString,
        g = n.hasOwnProperty,
        v = {},
        s = "1.11.3",
        x = function (e, t) {
            return new x.fn.init(e, t);
        },
        r = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
        l = /^-ms-/,
        c = /-([\da-z])/gi;
    function p(e) {
        var t = "length" in e && e.length,
            n = x.type(e);
        return (
            "function" !== n &&
            !x.isWindow(e) &&
            (!(1 !== e.nodeType || !t) ||
                "array" === n ||
                0 === t ||
                ("number" == typeof t && 0 < t && t - 1 in e))
        );
    }
    (x.fn = x.prototype =
        {
            jquery: s,
            constructor: x,
            selector: "",
            length: 0,
            toArray: function () {
                return d.call(this);
            },
            get: function (e) {
                return null != e
                    ? e < 0
                        ? this[e + this.length]
                        : this[e]
                    : d.call(this);
            },
            pushStack: function (e) {
                e = x.merge(this.constructor(), e);
                return (e.prevObject = this), (e.context = this.context), e;
            },
            each: function (e, t) {
                return x.each(this, e, t);
            },
            map: function (n) {
                return this.pushStack(
                    x.map(this, function (e, t) {
                        return n.call(e, t, e);
                    })
                );
            },
            slice: function () {
                return this.pushStack(d.apply(this, arguments));
            },
            first: function () {
                return this.eq(0);
            },
            last: function () {
                return this.eq(-1);
            },
            eq: function (e) {
                var t = this.length,
                    e = +e + (e < 0 ? t : 0);
                return this.pushStack(0 <= e && e < t ? [this[e]] : []);
            },
            end: function () {
                return this.prevObject || this.constructor(null);
            },
            push: a,
            sort: u.sort,
            splice: u.splice,
        }),
        (x.extend = x.fn.extend =
            function () {
                var e,
                    t,
                    n,
                    i,
                    o,
                    s = arguments[0] || {},
                    r = 1,
                    a = arguments.length,
                    l = !1;
                for (
                    "boolean" == typeof s &&
                        ((l = s), (s = arguments[r] || {}), r++),
                        "object" == typeof s || x.isFunction(s) || (s = {}),
                        r === a && ((s = this), r--);
                    r < a;
                    r++
                )
                    if (null != (i = arguments[r]))
                        for (n in i)
                            (o = s[n]),
                                (t = i[n]),
                                s !== t &&
                                    (l &&
                                    t &&
                                    (x.isPlainObject(t) || (e = x.isArray(t)))
                                        ? ((o = e
                                              ? ((e = !1),
                                                o && x.isArray(o) ? o : [])
                                              : o && x.isPlainObject(o)
                                              ? o
                                              : {}),
                                          (s[n] = x.extend(l, o, t)))
                                        : void 0 !== t && (s[n] = t));
                return s;
            }),
        x.extend({
            expando: "jQuery" + (s + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function (e) {
                throw new Error(e);
            },
            noop: function () {},
            isFunction: function (e) {
                return "function" === x.type(e);
            },
            isArray:
                Array.isArray ||
                function (e) {
                    return "array" === x.type(e);
                },
            isWindow: function (e) {
                return null != e && e == e.window;
            },
            isNumeric: function (e) {
                return !x.isArray(e) && 0 <= e - parseFloat(e) + 1;
            },
            isEmptyObject: function (e) {
                for (var t in e) return !1;
                return !0;
            },
            isPlainObject: function (e) {
                if (!e || "object" !== x.type(e) || e.nodeType || x.isWindow(e))
                    return !1;
                try {
                    if (
                        e.constructor &&
                        !g.call(e, "constructor") &&
                        !g.call(e.constructor.prototype, "isPrototypeOf")
                    )
                        return !1;
                } catch (e) {
                    return !1;
                }
                if (v.ownLast) for (var t in e) return g.call(e, t);
                for (t in e);
                return void 0 === t || g.call(e, t);
            },
            type: function (e) {
                return null == e
                    ? e + ""
                    : "object" == typeof e || "function" == typeof e
                    ? n[i.call(e)] || "object"
                    : typeof e;
            },
            globalEval: function (e) {
                e &&
                    x.trim(e) &&
                    (
                        h.execScript ||
                        function (e) {
                            h.eval.call(h, e);
                        }
                    )(e);
            },
            camelCase: function (e) {
                return e.replace(l, "ms-").replace(c, t);
            },
            nodeName: function (e, t) {
                return (
                    e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
                );
            },
            each: function (e, t, n) {
                var i,
                    o = 0,
                    s = e.length,
                    r = p(e);
                if (n) {
                    if (r) for (; o < s && !1 !== (i = t.apply(e[o], n)); o++);
                    else
                        for (o in e)
                            if (((i = t.apply(e[o], n)), !1 === i)) break;
                } else if (r)
                    for (; o < s && !1 !== (i = t.call(e[o], o, e[o])); o++);
                else
                    for (o in e)
                        if (((i = t.call(e[o], o, e[o])), !1 === i)) break;
                return e;
            },
            trim: function (e) {
                return null == e ? "" : (e + "").replace(r, "");
            },
            makeArray: function (e, t) {
                t = t || [];
                return (
                    null != e &&
                        (p(Object(e))
                            ? x.merge(t, "string" == typeof e ? [e] : e)
                            : a.call(t, e)),
                    t
                );
            },
            inArray: function (e, t, n) {
                var i;
                if (t) {
                    if (o) return o.call(t, e, n);
                    for (
                        i = t.length,
                            n = n ? (n < 0 ? Math.max(0, i + n) : n) : 0;
                        n < i;
                        n++
                    )
                        if (n in t && t[n] === e) return n;
                }
                return -1;
            },
            merge: function (e, t) {
                for (var n = +t.length, i = 0, o = e.length; i < n; )
                    e[o++] = t[i++];
                if (n != n) for (; void 0 !== t[i]; ) e[o++] = t[i++];
                return (e.length = o), e;
            },
            grep: function (e, t, n) {
                for (var i = [], o = 0, s = e.length, r = !n; o < s; o++)
                    !t(e[o], o) != r && i.push(e[o]);
                return i;
            },
            map: function (e, t, n) {
                var i,
                    o = 0,
                    s = e.length,
                    r = [];
                if (p(e))
                    for (; o < s; o++) null != (i = t(e[o], o, n)) && r.push(i);
                else for (o in e) (i = t(e[o], o, n)), null != i && r.push(i);
                return m.apply([], r);
            },
            guid: 1,
            proxy: function (e, t) {
                var n, i;
                return (
                    "string" == typeof t && ((i = e[t]), (t = e), (e = i)),
                    x.isFunction(e)
                        ? ((n = d.call(arguments, 2)),
                          ((i = function () {
                              return e.apply(
                                  t || this,
                                  n.concat(d.call(arguments))
                              );
                          }).guid = e.guid =
                              e.guid || x.guid++),
                          i)
                        : void 0
                );
            },
            now: function () {
                return +new Date();
            },
            support: v,
        }),
        x.each(
            "Boolean Number String Function Array Date RegExp Object Error".split(
                " "
            ),
            function (e, t) {
                n["[object " + t + "]"] = t.toLowerCase();
            }
        );
    var f = (function (n) {
        function u(e, t, n) {
            var i = "0x" + t - 65536;
            return i != i || n
                ? t
                : i < 0
                ? String.fromCharCode(65536 + i)
                : String.fromCharCode((i >> 10) | 55296, (1023 & i) | 56320);
        }
        function t() {
            g();
        }
        var e,
            p,
            w,
            s,
            i,
            f,
            h,
            m,
            x,
            c,
            d,
            g,
            k,
            o,
            v,
            y,
            r,
            a,
            b,
            T = "sizzle" + +new Date(),
            S = n.document,
            C = 0,
            j = 0,
            l = se(),
            $ = se(),
            _ = se(),
            A = function (e, t) {
                return e === t && (d = !0), 0;
            },
            E = {}.hasOwnProperty,
            D = [],
            N = D.pop,
            H = D.push,
            O = D.push,
            P = D.slice,
            L = function (e, t) {
                for (var n = 0, i = e.length; n < i; n++)
                    if (e[n] === t) return n;
                return -1;
            },
            I =
                "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            M = "[\\x20\\t\\r\\n\\f]",
            q = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
            W = q.replace("w", "w#"),
            z =
                "\\[" +
                M +
                "*(" +
                q +
                ")(?:" +
                M +
                "*([*^$|!~]?=)" +
                M +
                "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
                W +
                "))|)" +
                M +
                "*\\]",
            F =
                ":(" +
                q +
                ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
                z +
                ")*)|.*)\\)|)",
            R = new RegExp(M + "+", "g"),
            B = new RegExp(
                "^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$",
                "g"
            ),
            U = new RegExp("^" + M + "*," + M + "*"),
            X = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
            V = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"),
            Y = new RegExp(F),
            J = new RegExp("^" + W + "$"),
            G = {
                ID: new RegExp("^#(" + q + ")"),
                CLASS: new RegExp("^\\.(" + q + ")"),
                TAG: new RegExp("^(" + q.replace("w", "w*") + ")"),
                ATTR: new RegExp("^" + z),
                PSEUDO: new RegExp("^" + F),
                CHILD: new RegExp(
                    "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
                        M +
                        "*(even|odd|(([+-]|)(\\d*)n|)" +
                        M +
                        "*(?:([+-]|)" +
                        M +
                        "*(\\d+)|))" +
                        M +
                        "*\\)|)",
                    "i"
                ),
                bool: new RegExp("^(?:" + I + ")$", "i"),
                needsContext: new RegExp(
                    "^" +
                        M +
                        "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
                        M +
                        "*((?:-\\d)?\\d*)" +
                        M +
                        "*\\)|)(?=[^-]|$)",
                    "i"
                ),
            },
            Q = /^(?:input|select|textarea|button)$/i,
            K = /^h\d$/i,
            Z = /^[^{]+\{\s*\[native \w/,
            ee = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            te = /[+~]/,
            ne = /'|\\/g,
            ie = new RegExp(
                "\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)",
                "ig"
            );
        try {
            O.apply((D = P.call(S.childNodes)), S.childNodes),
                D[S.childNodes.length].nodeType;
        } catch (e) {
            O = {
                apply: D.length
                    ? function (e, t) {
                          H.apply(e, P.call(t));
                      }
                    : function (e, t) {
                          for (var n = e.length, i = 0; (e[n++] = t[i++]); );
                          e.length = n - 1;
                      },
            };
        }
        function oe(e, t, n, i) {
            var o, s, r, a, l, c, d;
            if (
                ((t ? t.ownerDocument || t : S) !== k && g(t),
                (n = n || []),
                (o = (t = t || k).nodeType),
                "string" != typeof e || !e || (1 !== o && 9 !== o && 11 !== o))
            )
                return n;
            if (!i && v) {
                if (11 !== o && (c = ee.exec(e)))
                    if ((d = c[1])) {
                        if (9 === o) {
                            if (!(a = t.getElementById(d)) || !a.parentNode)
                                return n;
                            if (a.id === d) return n.push(a), n;
                        } else if (
                            t.ownerDocument &&
                            (a = t.ownerDocument.getElementById(d)) &&
                            b(t, a) &&
                            a.id === d
                        )
                            return n.push(a), n;
                    } else {
                        if (c[2])
                            return O.apply(n, t.getElementsByTagName(e)), n;
                        if ((d = c[3]) && p.getElementsByClassName)
                            return O.apply(n, t.getElementsByClassName(d)), n;
                    }
                if (p.qsa && (!y || !y.test(e))) {
                    if (
                        ((l = a = T),
                        (c = t),
                        (d = 1 !== o && e),
                        1 === o && "object" !== t.nodeName.toLowerCase())
                    ) {
                        for (
                            r = f(e),
                                (a = t.getAttribute("id"))
                                    ? (l = a.replace(ne, "\\$&"))
                                    : t.setAttribute("id", l),
                                l = "[id='" + l + "'] ",
                                s = r.length;
                            s--;

                        )
                            r[s] = l + fe(r[s]);
                        (c = (te.test(e) && ue(t.parentNode)) || t),
                            (d = r.join(","));
                    }
                    if (d)
                        try {
                            return O.apply(n, c.querySelectorAll(d)), n;
                        } catch (e) {
                        } finally {
                            a || t.removeAttribute("id");
                        }
                }
            }
            return m(e.replace(B, "$1"), t, n, i);
        }
        function se() {
            var n = [];
            function i(e, t) {
                return (
                    n.push(e + " ") > w.cacheLength && delete i[n.shift()],
                    (i[e + " "] = t)
                );
            }
            return i;
        }
        function re(e) {
            return (e[T] = !0), e;
        }
        function ae(e) {
            var t = k.createElement("div");
            try {
                return !!e(t);
            } catch (e) {
                return !1;
            } finally {
                t.parentNode && t.parentNode.removeChild(t), (t = null);
            }
        }
        function le(e, t) {
            for (var n = e.split("|"), i = e.length; i--; )
                w.attrHandle[n[i]] = t;
        }
        function ce(e, t) {
            var n = t && e,
                i =
                    n &&
                    1 === e.nodeType &&
                    1 === t.nodeType &&
                    (~t.sourceIndex || 1 << 31) - (~e.sourceIndex || 1 << 31);
            if (i) return i;
            if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
            return e ? 1 : -1;
        }
        function de(r) {
            return re(function (s) {
                return (
                    (s = +s),
                    re(function (e, t) {
                        for (var n, i = r([], e.length, s), o = i.length; o--; )
                            e[(n = i[o])] && (e[n] = !(t[n] = e[n]));
                    })
                );
            });
        }
        function ue(e) {
            return e && void 0 !== e.getElementsByTagName && e;
        }
        for (e in ((p = oe.support = {}),
        (i = oe.isXML =
            function (e) {
                e = e && (e.ownerDocument || e).documentElement;
                return !!e && "HTML" !== e.nodeName;
            }),
        (g = oe.setDocument =
            function (e) {
                var l = e ? e.ownerDocument || e : S;
                return l !== k && 9 === l.nodeType && l.documentElement
                    ? ((o = (k = l).documentElement),
                      (e = l.defaultView) &&
                          e !== e.top &&
                          (e.addEventListener
                              ? e.addEventListener("unload", t, !1)
                              : e.attachEvent && e.attachEvent("onunload", t)),
                      (v = !i(l)),
                      (p.attributes = ae(function (e) {
                          return (
                              (e.className = "i"), !e.getAttribute("className")
                          );
                      })),
                      (p.getElementsByTagName = ae(function (e) {
                          return (
                              e.appendChild(l.createComment("")),
                              !e.getElementsByTagName("*").length
                          );
                      })),
                      (p.getElementsByClassName = Z.test(
                          l.getElementsByClassName
                      )),
                      (p.getById = ae(function (e) {
                          return (
                              (o.appendChild(e).id = T),
                              !l.getElementsByName ||
                                  !l.getElementsByName(T).length
                          );
                      })),
                      p.getById
                          ? ((w.find.ID = function (e, t) {
                                if (void 0 !== t.getElementById && v) {
                                    e = t.getElementById(e);
                                    return e && e.parentNode ? [e] : [];
                                }
                            }),
                            (w.filter.ID = function (e) {
                                var t = e.replace(ie, u);
                                return function (e) {
                                    return e.getAttribute("id") === t;
                                };
                            }))
                          : (delete w.find.ID,
                            (w.filter.ID = function (e) {
                                var t = e.replace(ie, u);
                                return function (e) {
                                    e =
                                        void 0 !== e.getAttributeNode &&
                                        e.getAttributeNode("id");
                                    return e && e.value === t;
                                };
                            })),
                      (w.find.TAG = p.getElementsByTagName
                          ? function (e, t) {
                                return void 0 !== t.getElementsByTagName
                                    ? t.getElementsByTagName(e)
                                    : p.qsa
                                    ? t.querySelectorAll(e)
                                    : void 0;
                            }
                          : function (e, t) {
                                var n,
                                    i = [],
                                    o = 0,
                                    s = t.getElementsByTagName(e);
                                if ("*" !== e) return s;
                                for (; (n = s[o++]); )
                                    1 === n.nodeType && i.push(n);
                                return i;
                            }),
                      (w.find.CLASS =
                          p.getElementsByClassName &&
                          function (e, t) {
                              return v ? t.getElementsByClassName(e) : void 0;
                          }),
                      (r = []),
                      (y = []),
                      (p.qsa = Z.test(l.querySelectorAll)) &&
                          (ae(function (e) {
                              (o.appendChild(e).innerHTML =
                                  "<a id='" +
                                  T +
                                  "'></a><select id='" +
                                  T +
                                  "-\f]' msallowcapture=''><option selected=''></option></select>"),
                                  e.querySelectorAll("[msallowcapture^='']")
                                      .length &&
                                      y.push("[*^$]=" + M + "*(?:''|\"\")"),
                                  e.querySelectorAll("[selected]").length ||
                                      y.push(
                                          "\\[" + M + "*(?:value|" + I + ")"
                                      ),
                                  e.querySelectorAll("[id~=" + T + "-]")
                                      .length || y.push("~="),
                                  e.querySelectorAll(":checked").length ||
                                      y.push(":checked"),
                                  e.querySelectorAll("a#" + T + "+*").length ||
                                      y.push(".#.+[+~]");
                          }),
                          ae(function (e) {
                              var t = l.createElement("input");
                              t.setAttribute("type", "hidden"),
                                  e.appendChild(t).setAttribute("name", "D"),
                                  e.querySelectorAll("[name=d]").length &&
                                      y.push("name" + M + "*[*^$|!~]?="),
                                  e.querySelectorAll(":enabled").length ||
                                      y.push(":enabled", ":disabled"),
                                  e.querySelectorAll("*,:x"),
                                  y.push(",.*:");
                          })),
                      (p.matchesSelector = Z.test(
                          (a =
                              o.matches ||
                              o.webkitMatchesSelector ||
                              o.mozMatchesSelector ||
                              o.oMatchesSelector ||
                              o.msMatchesSelector)
                      )) &&
                          ae(function (e) {
                              (p.disconnectedMatch = a.call(e, "div")),
                                  a.call(e, "[s!='']:x"),
                                  r.push("!=", F);
                          }),
                      (y = y.length && new RegExp(y.join("|"))),
                      (r = r.length && new RegExp(r.join("|"))),
                      (e = Z.test(o.compareDocumentPosition)),
                      (b =
                          e || Z.test(o.contains)
                              ? function (e, t) {
                                    var n =
                                            9 === e.nodeType
                                                ? e.documentElement
                                                : e,
                                        t = t && t.parentNode;
                                    return (
                                        e === t ||
                                        !(
                                            !t ||
                                            1 !== t.nodeType ||
                                            !(n.contains
                                                ? n.contains(t)
                                                : e.compareDocumentPosition &&
                                                  16 &
                                                      e.compareDocumentPosition(
                                                          t
                                                      ))
                                        )
                                    );
                                }
                              : function (e, t) {
                                    if (t)
                                        for (; (t = t.parentNode); )
                                            if (t === e) return !0;
                                    return !1;
                                }),
                      (A = e
                          ? function (e, t) {
                                if (e === t) return (d = !0), 0;
                                var n =
                                    !e.compareDocumentPosition -
                                    !t.compareDocumentPosition;
                                return (
                                    n ||
                                    (1 &
                                        (n =
                                            (e.ownerDocument || e) ===
                                            (t.ownerDocument || t)
                                                ? e.compareDocumentPosition(t)
                                                : 1) ||
                                    (!p.sortDetached &&
                                        t.compareDocumentPosition(e) === n)
                                        ? e === l ||
                                          (e.ownerDocument === S && b(S, e))
                                            ? -1
                                            : t === l ||
                                              (t.ownerDocument === S && b(S, t))
                                            ? 1
                                            : c
                                            ? L(c, e) - L(c, t)
                                            : 0
                                        : 4 & n
                                        ? -1
                                        : 1)
                                );
                            }
                          : function (e, t) {
                                if (e === t) return (d = !0), 0;
                                var n,
                                    i = 0,
                                    o = e.parentNode,
                                    s = t.parentNode,
                                    r = [e],
                                    a = [t];
                                if (!o || !s)
                                    return e === l
                                        ? -1
                                        : t === l
                                        ? 1
                                        : o
                                        ? -1
                                        : s
                                        ? 1
                                        : c
                                        ? L(c, e) - L(c, t)
                                        : 0;
                                if (o === s) return ce(e, t);
                                for (n = e; (n = n.parentNode); ) r.unshift(n);
                                for (n = t; (n = n.parentNode); ) a.unshift(n);
                                for (; r[i] === a[i]; ) i++;
                                return i
                                    ? ce(r[i], a[i])
                                    : r[i] === S
                                    ? -1
                                    : a[i] === S
                                    ? 1
                                    : 0;
                            }),
                      l)
                    : k;
            }),
        (oe.matches = function (e, t) {
            return oe(e, null, null, t);
        }),
        (oe.matchesSelector = function (e, t) {
            if (
                ((e.ownerDocument || e) !== k && g(e),
                (t = t.replace(V, "='$1']")),
                !(
                    !p.matchesSelector ||
                    !v ||
                    (r && r.test(t)) ||
                    (y && y.test(t))
                ))
            )
                try {
                    var n = a.call(e, t);
                    if (
                        n ||
                        p.disconnectedMatch ||
                        (e.document && 11 !== e.document.nodeType)
                    )
                        return n;
                } catch (e) {}
            return 0 < oe(t, k, null, [e]).length;
        }),
        (oe.contains = function (e, t) {
            return (e.ownerDocument || e) !== k && g(e), b(e, t);
        }),
        (oe.attr = function (e, t) {
            (e.ownerDocument || e) !== k && g(e);
            var n = w.attrHandle[t.toLowerCase()],
                n =
                    n && E.call(w.attrHandle, t.toLowerCase())
                        ? n(e, t, !v)
                        : void 0;
            return void 0 !== n
                ? n
                : p.attributes || !v
                ? e.getAttribute(t)
                : (n = e.getAttributeNode(t)) && n.specified
                ? n.value
                : null;
        }),
        (oe.error = function (e) {
            throw new Error("Syntax error, unrecognized expression: " + e);
        }),
        (oe.uniqueSort = function (e) {
            var t,
                n = [],
                i = 0,
                o = 0;
            if (
                ((d = !p.detectDuplicates),
                (c = !p.sortStable && e.slice(0)),
                e.sort(A),
                d)
            ) {
                for (; (t = e[o++]); ) t === e[o] && (i = n.push(o));
                for (; i--; ) e.splice(n[i], 1);
            }
            return (c = null), e;
        }),
        (s = oe.getText =
            function (e) {
                var t,
                    n = "",
                    i = 0,
                    o = e.nodeType;
                if (o) {
                    if (1 === o || 9 === o || 11 === o) {
                        if ("string" == typeof e.textContent)
                            return e.textContent;
                        for (e = e.firstChild; e; e = e.nextSibling) n += s(e);
                    } else if (3 === o || 4 === o) return e.nodeValue;
                } else for (; (t = e[i++]); ) n += s(t);
                return n;
            }),
        ((w = oe.selectors =
            {
                cacheLength: 50,
                createPseudo: re,
                match: G,
                attrHandle: {},
                find: {},
                relative: {
                    ">": { dir: "parentNode", first: !0 },
                    " ": { dir: "parentNode" },
                    "+": { dir: "previousSibling", first: !0 },
                    "~": { dir: "previousSibling" },
                },
                preFilter: {
                    ATTR: function (e) {
                        return (
                            (e[1] = e[1].replace(ie, u)),
                            (e[3] = (e[3] || e[4] || e[5] || "").replace(
                                ie,
                                u
                            )),
                            "~=" === e[2] && (e[3] = " " + e[3] + " "),
                            e.slice(0, 4)
                        );
                    },
                    CHILD: function (e) {
                        return (
                            (e[1] = e[1].toLowerCase()),
                            "nth" === e[1].slice(0, 3)
                                ? (e[3] || oe.error(e[0]),
                                  (e[4] = +(e[4]
                                      ? e[5] + (e[6] || 1)
                                      : 2 *
                                        ("even" === e[3] || "odd" === e[3]))),
                                  (e[5] = +(e[7] + e[8] || "odd" === e[3])))
                                : e[3] && oe.error(e[0]),
                            e
                        );
                    },
                    PSEUDO: function (e) {
                        var t,
                            n = !e[6] && e[2];
                        return G.CHILD.test(e[0])
                            ? null
                            : (e[3]
                                  ? (e[2] = e[4] || e[5] || "")
                                  : n &&
                                    Y.test(n) &&
                                    (t = f(n, !0)) &&
                                    (t =
                                        n.indexOf(")", n.length - t) -
                                        n.length) &&
                                    ((e[0] = e[0].slice(0, t)),
                                    (e[2] = n.slice(0, t))),
                              e.slice(0, 3));
                    },
                },
                filter: {
                    TAG: function (e) {
                        var t = e.replace(ie, u).toLowerCase();
                        return "*" === e
                            ? function () {
                                  return !0;
                              }
                            : function (e) {
                                  return (
                                      e.nodeName &&
                                      e.nodeName.toLowerCase() === t
                                  );
                              };
                    },
                    CLASS: function (e) {
                        var t = l[e + " "];
                        return (
                            t ||
                            ((t = new RegExp(
                                "(^|" + M + ")" + e + "(" + M + "|$)"
                            )) &&
                                l(e, function (e) {
                                    return t.test(
                                        ("string" == typeof e.className &&
                                            e.className) ||
                                            (void 0 !== e.getAttribute &&
                                                e.getAttribute("class")) ||
                                            ""
                                    );
                                }))
                        );
                    },
                    ATTR: function (t, n, i) {
                        return function (e) {
                            e = oe.attr(e, t);
                            return null == e
                                ? "!=" === n
                                : !n ||
                                      ((e += ""),
                                      "=" === n
                                          ? e === i
                                          : "!=" === n
                                          ? e !== i
                                          : "^=" === n
                                          ? i && 0 === e.indexOf(i)
                                          : "*=" === n
                                          ? i && -1 < e.indexOf(i)
                                          : "$=" === n
                                          ? i && e.slice(-i.length) === i
                                          : "~=" === n
                                          ? -1 <
                                            (
                                                " " +
                                                e.replace(R, " ") +
                                                " "
                                            ).indexOf(i)
                                          : "|=" === n &&
                                            (e === i ||
                                                e.slice(0, i.length + 1) ===
                                                    i + "-"));
                        };
                    },
                    CHILD: function (f, e, t, h, m) {
                        var g = "nth" !== f.slice(0, 3),
                            v = "last" !== f.slice(-4),
                            y = "of-type" === e;
                        return 1 === h && 0 === m
                            ? function (e) {
                                  return !!e.parentNode;
                              }
                            : function (e, t, n) {
                                  var i,
                                      o,
                                      s,
                                      r,
                                      a,
                                      l,
                                      c =
                                          g != v
                                              ? "nextSibling"
                                              : "previousSibling",
                                      d = e.parentNode,
                                      u = y && e.nodeName.toLowerCase(),
                                      p = !n && !y;
                                  if (d) {
                                      if (g) {
                                          for (; c; ) {
                                              for (s = e; (s = s[c]); )
                                                  if (
                                                      y
                                                          ? s.nodeName.toLowerCase() ===
                                                            u
                                                          : 1 === s.nodeType
                                                  )
                                                      return !1;
                                              l = c =
                                                  "only" === f &&
                                                  !l &&
                                                  "nextSibling";
                                          }
                                          return !0;
                                      }
                                      if (
                                          ((l = [
                                              v ? d.firstChild : d.lastChild,
                                          ]),
                                          v && p)
                                      ) {
                                          for (
                                              a =
                                                  (i =
                                                      (o = d[T] || (d[T] = {}))[
                                                          f
                                                      ] || [])[0] === C && i[1],
                                                  r = i[0] === C && i[2],
                                                  s = a && d.childNodes[a];
                                              (s =
                                                  (++a && s && s[c]) ||
                                                  (r = a = 0) ||
                                                  l.pop());

                                          )
                                              if (
                                                  1 === s.nodeType &&
                                                  ++r &&
                                                  s === e
                                              ) {
                                                  o[f] = [C, a, r];
                                                  break;
                                              }
                                      } else if (
                                          p &&
                                          (i = (e[T] || (e[T] = {}))[f]) &&
                                          i[0] === C
                                      )
                                          r = i[1];
                                      else
                                          for (
                                              ;
                                              (s =
                                                  (++a && s && s[c]) ||
                                                  (r = a = 0) ||
                                                  l.pop()) &&
                                              ((y
                                                  ? s.nodeName.toLowerCase() !==
                                                    u
                                                  : 1 !== s.nodeType) ||
                                                  !++r ||
                                                  (p &&
                                                      ((s[T] || (s[T] = {}))[
                                                          f
                                                      ] = [C, r]),
                                                  s !== e));

                                          );
                                      return (
                                          (r -= m) === h ||
                                          (r % h == 0 && 0 <= r / h)
                                      );
                                  }
                              };
                    },
                    PSEUDO: function (e, s) {
                        var t,
                            r =
                                w.pseudos[e] ||
                                w.setFilters[e.toLowerCase()] ||
                                oe.error("unsupported pseudo: " + e);
                        return r[T]
                            ? r(s)
                            : 1 < r.length
                            ? ((t = [e, e, "", s]),
                              w.setFilters.hasOwnProperty(e.toLowerCase())
                                  ? re(function (e, t) {
                                        for (
                                            var n, i = r(e, s), o = i.length;
                                            o--;

                                        )
                                            e[(n = L(e, i[o]))] = !(t[n] =
                                                i[o]);
                                    })
                                  : function (e) {
                                        return r(e, 0, t);
                                    })
                            : r;
                    },
                },
                pseudos: {
                    not: re(function (e) {
                        var i = [],
                            o = [],
                            a = h(e.replace(B, "$1"));
                        return a[T]
                            ? re(function (e, t, n, i) {
                                  for (
                                      var o,
                                          s = a(e, null, i, []),
                                          r = e.length;
                                      r--;

                                  )
                                      (o = s[r]) && (e[r] = !(t[r] = o));
                              })
                            : function (e, t, n) {
                                  return (
                                      (i[0] = e),
                                      a(i, null, n, o),
                                      (i[0] = null),
                                      !o.pop()
                                  );
                              };
                    }),
                    has: re(function (t) {
                        return function (e) {
                            return 0 < oe(t, e).length;
                        };
                    }),
                    contains: re(function (t) {
                        return (
                            (t = t.replace(ie, u)),
                            function (e) {
                                return (
                                    -1 <
                                    (
                                        e.textContent ||
                                        e.innerText ||
                                        s(e)
                                    ).indexOf(t)
                                );
                            }
                        );
                    }),
                    lang: re(function (n) {
                        return (
                            J.test(n || "") ||
                                oe.error("unsupported lang: " + n),
                            (n = n.replace(ie, u).toLowerCase()),
                            function (e) {
                                var t;
                                do {
                                    if (
                                        (t = v
                                            ? e.lang
                                            : e.getAttribute("xml:lang") ||
                                              e.getAttribute("lang"))
                                    )
                                        return (
                                            (t = t.toLowerCase()) === n ||
                                            0 === t.indexOf(n + "-")
                                        );
                                } while (
                                    (e = e.parentNode) &&
                                    1 === e.nodeType
                                );
                                return !1;
                            }
                        );
                    }),
                    target: function (e) {
                        var t = n.location && n.location.hash;
                        return t && t.slice(1) === e.id;
                    },
                    root: function (e) {
                        return e === o;
                    },
                    focus: function (e) {
                        return (
                            e === k.activeElement &&
                            (!k.hasFocus || k.hasFocus()) &&
                            !!(e.type || e.href || ~e.tabIndex)
                        );
                    },
                    enabled: function (e) {
                        return !1 === e.disabled;
                    },
                    disabled: function (e) {
                        return !0 === e.disabled;
                    },
                    checked: function (e) {
                        var t = e.nodeName.toLowerCase();
                        return (
                            ("input" === t && !!e.checked) ||
                            ("option" === t && !!e.selected)
                        );
                    },
                    selected: function (e) {
                        return (
                            e.parentNode && e.parentNode.selectedIndex,
                            !0 === e.selected
                        );
                    },
                    empty: function (e) {
                        for (e = e.firstChild; e; e = e.nextSibling)
                            if (e.nodeType < 6) return !1;
                        return !0;
                    },
                    parent: function (e) {
                        return !w.pseudos.empty(e);
                    },
                    header: function (e) {
                        return K.test(e.nodeName);
                    },
                    input: function (e) {
                        return Q.test(e.nodeName);
                    },
                    button: function (e) {
                        var t = e.nodeName.toLowerCase();
                        return (
                            ("input" === t && "button" === e.type) ||
                            "button" === t
                        );
                    },
                    text: function (e) {
                        return (
                            "input" === e.nodeName.toLowerCase() &&
                            "text" === e.type &&
                            (null == (e = e.getAttribute("type")) ||
                                "text" === e.toLowerCase())
                        );
                    },
                    first: de(function () {
                        return [0];
                    }),
                    last: de(function (e, t) {
                        return [t - 1];
                    }),
                    eq: de(function (e, t, n) {
                        return [n < 0 ? n + t : n];
                    }),
                    even: de(function (e, t) {
                        for (var n = 0; n < t; n += 2) e.push(n);
                        return e;
                    }),
                    odd: de(function (e, t) {
                        for (var n = 1; n < t; n += 2) e.push(n);
                        return e;
                    }),
                    lt: de(function (e, t, n) {
                        for (var i = n < 0 ? n + t : n; 0 <= --i; ) e.push(i);
                        return e;
                    }),
                    gt: de(function (e, t, n) {
                        for (var i = n < 0 ? n + t : n; ++i < t; ) e.push(i);
                        return e;
                    }),
                },
            }).pseudos.nth = w.pseudos.eq),
        { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
            w.pseudos[e] = (function (t) {
                return function (e) {
                    return "input" === e.nodeName.toLowerCase() && e.type === t;
                };
            })(e);
        for (e in { submit: !0, reset: !0 })
            w.pseudos[e] = (function (n) {
                return function (e) {
                    var t = e.nodeName.toLowerCase();
                    return ("input" === t || "button" === t) && e.type === n;
                };
            })(e);
        function pe() {}
        function fe(e) {
            for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
            return i;
        }
        function he(r, e, t) {
            var a = e.dir,
                l = t && "parentNode" === a,
                c = j++;
            return e.first
                ? function (e, t, n) {
                      for (; (e = e[a]); )
                          if (1 === e.nodeType || l) return r(e, t, n);
                  }
                : function (e, t, n) {
                      var i,
                          o,
                          s = [C, c];
                      if (n) {
                          for (; (e = e[a]); )
                              if ((1 === e.nodeType || l) && r(e, t, n))
                                  return !0;
                      } else
                          for (; (e = e[a]); )
                              if (1 === e.nodeType || l) {
                                  if (
                                      (i = (o = e[T] || (e[T] = {}))[a]) &&
                                      i[0] === C &&
                                      i[1] === c
                                  )
                                      return (s[2] = i[2]);
                                  if (((o[a] = s)[2] = r(e, t, n))) return !0;
                              }
                  };
        }
        function me(o) {
            return 1 < o.length
                ? function (e, t, n) {
                      for (var i = o.length; i--; )
                          if (!o[i](e, t, n)) return !1;
                      return !0;
                  }
                : o[0];
        }
        function ge(e, t, n, i, o) {
            for (var s, r = [], a = 0, l = e.length, c = null != t; a < l; a++)
                !(s = e[a]) ||
                    (n && !n(s, i, o)) ||
                    (r.push(s), c && t.push(a));
            return r;
        }
        function ve(f, h, m, g, v, e) {
            return (
                g && !g[T] && (g = ve(g)),
                v && !v[T] && (v = ve(v, e)),
                re(function (e, t, n, i) {
                    var o,
                        s,
                        r,
                        a = [],
                        l = [],
                        c = t.length,
                        d =
                            e ||
                            (function (e, t, n) {
                                for (var i = 0, o = t.length; i < o; i++)
                                    oe(e, t[i], n);
                                return n;
                            })(h || "*", n.nodeType ? [n] : n, []),
                        u = !f || (!e && h) ? d : ge(d, a, f, n, i),
                        p = m ? (v || (e ? f : c || g) ? [] : t) : u;
                    if ((m && m(u, p, n, i), g))
                        for (o = ge(p, l), g(o, [], n, i), s = o.length; s--; )
                            (r = o[s]) && (p[l[s]] = !(u[l[s]] = r));
                    if (e) {
                        if (v || f) {
                            if (v) {
                                for (o = [], s = p.length; s--; )
                                    (r = p[s]) && o.push((u[s] = r));
                                v(null, (p = []), o, i);
                            }
                            for (s = p.length; s--; )
                                (r = p[s]) &&
                                    -1 < (o = v ? L(e, r) : a[s]) &&
                                    (e[o] = !(t[o] = r));
                        }
                    } else (p = ge(p === t ? p.splice(c, p.length) : p)), v ? v(null, t, p, i) : O.apply(t, p);
                })
            );
        }
        function ye(g, v) {
            function e(e, t, n, i, o) {
                var s,
                    r,
                    a,
                    l = 0,
                    c = "0",
                    d = e && [],
                    u = [],
                    p = x,
                    f = e || (b && w.find.TAG("*", o)),
                    h = (C += null == p ? 1 : Math.random() || 0.1),
                    m = f.length;
                for (
                    o && (x = t !== k && t);
                    c !== m && null != (s = f[c]);
                    c++
                ) {
                    if (b && s) {
                        for (r = 0; (a = g[r++]); )
                            if (a(s, t, n)) {
                                i.push(s);
                                break;
                            }
                        o && (C = h);
                    }
                    y && ((s = !a && s) && l--, e && d.push(s));
                }
                if (((l += c), y && c !== l)) {
                    for (r = 0; (a = v[r++]); ) a(d, u, t, n);
                    if (e) {
                        if (0 < l)
                            for (; c--; ) d[c] || u[c] || (u[c] = N.call(i));
                        u = ge(u);
                    }
                    O.apply(i, u),
                        o &&
                            !e &&
                            0 < u.length &&
                            1 < l + v.length &&
                            oe.uniqueSort(i);
                }
                return o && ((C = h), (x = p)), d;
            }
            var y = 0 < v.length,
                b = 0 < g.length;
            return y ? re(e) : e;
        }
        return (
            (pe.prototype = w.filters = w.pseudos),
            (w.setFilters = new pe()),
            (f = oe.tokenize =
                function (e, t) {
                    var n,
                        i,
                        o,
                        s,
                        r,
                        a,
                        l,
                        c = $[e + " "];
                    if (c) return t ? 0 : c.slice(0);
                    for (r = e, a = [], l = w.preFilter; r; ) {
                        for (s in ((n && !(i = U.exec(r))) ||
                            (i && (r = r.slice(i[0].length) || r),
                            a.push((o = []))),
                        (n = !1),
                        (i = X.exec(r)) &&
                            ((n = i.shift()),
                            o.push({ value: n, type: i[0].replace(B, " ") }),
                            (r = r.slice(n.length))),
                        w.filter))
                            !(i = G[s].exec(r)) ||
                                (l[s] && !(i = l[s](i))) ||
                                ((n = i.shift()),
                                o.push({ value: n, type: s, matches: i }),
                                (r = r.slice(n.length)));
                        if (!n) break;
                    }
                    return t ? r.length : r ? oe.error(e) : $(e, a).slice(0);
                }),
            (h = oe.compile =
                function (e, t) {
                    var n,
                        i = [],
                        o = [],
                        s = _[e + " "];
                    if (!s) {
                        for (n = (t = t || f(e)).length; n--; )
                            ((s = (function e(t) {
                                for (
                                    var i,
                                        n,
                                        o,
                                        s = t.length,
                                        r = w.relative[t[0].type],
                                        a = r || w.relative[" "],
                                        l = r ? 1 : 0,
                                        c = he(
                                            function (e) {
                                                return e === i;
                                            },
                                            a,
                                            !0
                                        ),
                                        d = he(
                                            function (e) {
                                                return -1 < L(i, e);
                                            },
                                            a,
                                            !0
                                        ),
                                        u = [
                                            function (e, t, n) {
                                                return (
                                                    (n =
                                                        (!r &&
                                                            (n || t !== x)) ||
                                                        ((i = t).nodeType
                                                            ? c
                                                            : d)(e, t, n)),
                                                    (i = null),
                                                    n
                                                );
                                            },
                                        ];
                                    l < s;
                                    l++
                                )
                                    if ((n = w.relative[t[l].type]))
                                        u = [he(me(u), n)];
                                    else {
                                        if (
                                            (n = w.filter[t[l].type].apply(
                                                null,
                                                t[l].matches
                                            ))[T]
                                        ) {
                                            for (
                                                o = ++l;
                                                o < s && !w.relative[t[o].type];
                                                o++
                                            );
                                            return ve(
                                                1 < l && me(u),
                                                1 < l &&
                                                    fe(
                                                        t
                                                            .slice(0, l - 1)
                                                            .concat({
                                                                value:
                                                                    " " ===
                                                                    t[l - 2]
                                                                        .type
                                                                        ? "*"
                                                                        : "",
                                                            })
                                                    ).replace(B, "$1"),
                                                n,
                                                l < o && e(t.slice(l, o)),
                                                o < s && e((t = t.slice(o))),
                                                o < s && fe(t)
                                            );
                                        }
                                        u.push(n);
                                    }
                                return me(u);
                            })(t[n]))[T]
                                ? i
                                : o
                            ).push(s);
                        (s = _(e, ye(o, i))).selector = e;
                    }
                    return s;
                }),
            (m = oe.select =
                function (e, t, n, i) {
                    var o,
                        s,
                        r,
                        a,
                        l,
                        c = "function" == typeof e && e,
                        d = !i && f((e = c.selector || e));
                    if (((n = n || []), 1 === d.length)) {
                        if (
                            2 < (s = d[0] = d[0].slice(0)).length &&
                            "ID" === (r = s[0]).type &&
                            p.getById &&
                            9 === t.nodeType &&
                            v &&
                            w.relative[s[1].type]
                        ) {
                            if (
                                !(t = (w.find.ID(
                                    r.matches[0].replace(ie, u),
                                    t
                                ) || [])[0])
                            )
                                return n;
                            c && (t = t.parentNode),
                                (e = e.slice(s.shift().value.length));
                        }
                        for (
                            o = G.needsContext.test(e) ? 0 : s.length;
                            o-- && ((r = s[o]), !w.relative[(a = r.type)]);

                        )
                            if (
                                (l = w.find[a]) &&
                                (i = l(
                                    r.matches[0].replace(ie, u),
                                    (te.test(s[0].type) && ue(t.parentNode)) ||
                                        t
                                ))
                            ) {
                                if ((s.splice(o, 1), !(e = i.length && fe(s))))
                                    return O.apply(n, i), n;
                                break;
                            }
                    }
                    return (
                        (c || h(e, d))(
                            i,
                            t,
                            !v,
                            n,
                            (te.test(e) && ue(t.parentNode)) || t
                        ),
                        n
                    );
                }),
            (p.sortStable = T.split("").sort(A).join("") === T),
            (p.detectDuplicates = !!d),
            g(),
            (p.sortDetached = ae(function (e) {
                return 1 & e.compareDocumentPosition(k.createElement("div"));
            })),
            ae(function (e) {
                return (
                    (e.innerHTML = "<a href='#'></a>"),
                    "#" === e.firstChild.getAttribute("href")
                );
            }) ||
                le("type|href|height|width", function (e, t, n) {
                    return n
                        ? void 0
                        : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
                }),
            (p.attributes &&
                ae(function (e) {
                    return (
                        (e.innerHTML = "<input/>"),
                        e.firstChild.setAttribute("value", ""),
                        "" === e.firstChild.getAttribute("value")
                    );
                })) ||
                le("value", function (e, t, n) {
                    return n || "input" !== e.nodeName.toLowerCase()
                        ? void 0
                        : e.defaultValue;
                }),
            ae(function (e) {
                return null == e.getAttribute("disabled");
            }) ||
                le(I, function (e, t, n) {
                    return n
                        ? void 0
                        : !0 === e[t]
                        ? t.toLowerCase()
                        : (t = e.getAttributeNode(t)) && t.specified
                        ? t.value
                        : null;
                }),
            oe
        );
    })(h);
    (x.find = f),
        (x.expr = f.selectors),
        (x.expr[":"] = x.expr.pseudos),
        (x.unique = f.uniqueSort),
        (x.text = f.getText),
        (x.isXMLDoc = f.isXML),
        (x.contains = f.contains);
    var y = x.expr.match.needsContext,
        b = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
        w = /^.[^:#\[\.,]*$/;
    function k(e, n, i) {
        if (x.isFunction(n))
            return x.grep(e, function (e, t) {
                return !!n.call(e, t, e) !== i;
            });
        if (n.nodeType)
            return x.grep(e, function (e) {
                return (e === n) !== i;
            });
        if ("string" == typeof n) {
            if (w.test(n)) return x.filter(n, e, i);
            n = x.filter(n, e);
        }
        return x.grep(e, function (e) {
            return 0 <= x.inArray(e, n) !== i;
        });
    }
    (x.filter = function (e, t, n) {
        var i = t[0];
        return (
            n && (e = ":not(" + e + ")"),
            1 === t.length && 1 === i.nodeType
                ? x.find.matchesSelector(i, e)
                    ? [i]
                    : []
                : x.find.matches(
                      e,
                      x.grep(t, function (e) {
                          return 1 === e.nodeType;
                      })
                  )
        );
    }),
        x.fn.extend({
            find: function (e) {
                var t,
                    n = [],
                    i = this,
                    o = i.length;
                if ("string" != typeof e)
                    return this.pushStack(
                        x(e).filter(function () {
                            for (t = 0; t < o; t++)
                                if (x.contains(i[t], this)) return !0;
                        })
                    );
                for (t = 0; t < o; t++) x.find(e, i[t], n);
                return (
                    ((n = this.pushStack(1 < o ? x.unique(n) : n)).selector =
                        this.selector ? this.selector + " " + e : e),
                    n
                );
            },
            filter: function (e) {
                return this.pushStack(k(this, e || [], !1));
            },
            not: function (e) {
                return this.pushStack(k(this, e || [], !0));
            },
            is: function (e) {
                return !!k(
                    this,
                    "string" == typeof e && y.test(e) ? x(e) : e || [],
                    !1
                ).length;
            },
        });
    var T = h.document,
        S = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/;
    (x.fn.init = function (e, t) {
        var n, i;
        if (!e) return this;
        if ("string" != typeof e)
            return e.nodeType
                ? ((this.context = this[0] = e), (this.length = 1), this)
                : x.isFunction(e)
                ? void 0 !== C.ready
                    ? C.ready(e)
                    : e(x)
                : (void 0 !== e.selector &&
                      ((this.selector = e.selector),
                      (this.context = e.context)),
                  x.makeArray(e, this));
        if (
            !(n =
                "<" === e.charAt(0) &&
                ">" === e.charAt(e.length - 1) &&
                3 <= e.length
                    ? [null, e, null]
                    : S.exec(e)) ||
            (!n[1] && t)
        )
            return (!t || t.jquery ? t || C : this.constructor(t)).find(e);
        if (n[1]) {
            if (
                ((t = t instanceof x ? t[0] : t),
                x.merge(
                    this,
                    x.parseHTML(
                        n[1],
                        t && t.nodeType ? t.ownerDocument || t : T,
                        !0
                    )
                ),
                b.test(n[1]) && x.isPlainObject(t))
            )
                for (n in t)
                    x.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
            return this;
        }
        if ((i = T.getElementById(n[2])) && i.parentNode) {
            if (i.id !== n[2]) return C.find(e);
            (this.length = 1), (this[0] = i);
        }
        return (this.context = T), (this.selector = e), this;
    }).prototype = x.fn;
    var C = x(T),
        j = /^(?:parents|prev(?:Until|All))/,
        $ = { children: !0, contents: !0, next: !0, prev: !0 };
    function _(e, t) {
        for (; (e = e[t]) && 1 !== e.nodeType; );
        return e;
    }
    x.extend({
        dir: function (e, t, n) {
            for (
                var i = [], o = e[t];
                o &&
                9 !== o.nodeType &&
                (void 0 === n || 1 !== o.nodeType || !x(o).is(n));

            )
                1 === o.nodeType && i.push(o), (o = o[t]);
            return i;
        },
        sibling: function (e, t) {
            for (var n = []; e; e = e.nextSibling)
                1 === e.nodeType && e !== t && n.push(e);
            return n;
        },
    }),
        x.fn.extend({
            has: function (e) {
                var t,
                    n = x(e, this),
                    i = n.length;
                return this.filter(function () {
                    for (t = 0; t < i; t++)
                        if (x.contains(this, n[t])) return !0;
                });
            },
            closest: function (e, t) {
                for (
                    var n,
                        i = 0,
                        o = this.length,
                        s = [],
                        r =
                            y.test(e) || "string" != typeof e
                                ? x(e, t || this.context)
                                : 0;
                    i < o;
                    i++
                )
                    for (n = this[i]; n && n !== t; n = n.parentNode)
                        if (
                            n.nodeType < 11 &&
                            (r
                                ? -1 < r.index(n)
                                : 1 === n.nodeType &&
                                  x.find.matchesSelector(n, e))
                        ) {
                            s.push(n);
                            break;
                        }
                return this.pushStack(1 < s.length ? x.unique(s) : s);
            },
            index: function (e) {
                return e
                    ? "string" == typeof e
                        ? x.inArray(this[0], x(e))
                        : x.inArray(e.jquery ? e[0] : e, this)
                    : this[0] && this[0].parentNode
                    ? this.first().prevAll().length
                    : -1;
            },
            add: function (e, t) {
                return this.pushStack(x.unique(x.merge(this.get(), x(e, t))));
            },
            addBack: function (e) {
                return this.add(
                    null == e ? this.prevObject : this.prevObject.filter(e)
                );
            },
        }),
        x.each(
            {
                parent: function (e) {
                    e = e.parentNode;
                    return e && 11 !== e.nodeType ? e : null;
                },
                parents: function (e) {
                    return x.dir(e, "parentNode");
                },
                parentsUntil: function (e, t, n) {
                    return x.dir(e, "parentNode", n);
                },
                next: function (e) {
                    return _(e, "nextSibling");
                },
                prev: function (e) {
                    return _(e, "previousSibling");
                },
                nextAll: function (e) {
                    return x.dir(e, "nextSibling");
                },
                prevAll: function (e) {
                    return x.dir(e, "previousSibling");
                },
                nextUntil: function (e, t, n) {
                    return x.dir(e, "nextSibling", n);
                },
                prevUntil: function (e, t, n) {
                    return x.dir(e, "previousSibling", n);
                },
                siblings: function (e) {
                    return x.sibling((e.parentNode || {}).firstChild, e);
                },
                children: function (e) {
                    return x.sibling(e.firstChild);
                },
                contents: function (e) {
                    return x.nodeName(e, "iframe")
                        ? e.contentDocument || e.contentWindow.document
                        : x.merge([], e.childNodes);
                },
            },
            function (i, o) {
                x.fn[i] = function (e, t) {
                    var n = x.map(this, o, e);
                    return (
                        (t = "Until" !== i.slice(-5) ? e : t) &&
                            "string" == typeof t &&
                            (n = x.filter(t, n)),
                        1 < this.length &&
                            ($[i] || (n = x.unique(n)),
                            j.test(i) && (n = n.reverse())),
                        this.pushStack(n)
                    );
                };
            }
        );
    var A,
        E = /\S+/g,
        D = {};
    function N() {
        T.addEventListener
            ? (T.removeEventListener("DOMContentLoaded", H, !1),
              h.removeEventListener("load", H, !1))
            : (T.detachEvent("onreadystatechange", H),
              h.detachEvent("onload", H));
    }
    function H() {
        (!T.addEventListener &&
            "load" !== event.type &&
            "complete" !== T.readyState) ||
            (N(), x.ready());
    }
    (x.Callbacks = function (o) {
        var e, n;
        o =
            "string" == typeof o
                ? D[o] ||
                  ((n = D[(e = o)] = {}),
                  x.each(e.match(E) || [], function (e, t) {
                      n[t] = !0;
                  }),
                  n)
                : x.extend({}, o);
        var i,
            t,
            s,
            r,
            a,
            l,
            c = [],
            d = !o.once && [],
            u = function (e) {
                for (
                    t = o.memory && e,
                        s = !0,
                        a = l || 0,
                        l = 0,
                        r = c.length,
                        i = !0;
                    c && a < r;
                    a++
                )
                    if (!1 === c[a].apply(e[0], e[1]) && o.stopOnFalse) {
                        t = !1;
                        break;
                    }
                (i = !1),
                    c &&
                        (d
                            ? d.length && u(d.shift())
                            : t
                            ? (c = [])
                            : p.disable());
            },
            p = {
                add: function () {
                    var e;
                    return (
                        c &&
                            ((e = c.length),
                            (function i(e) {
                                x.each(e, function (e, t) {
                                    var n = x.type(t);
                                    "function" === n
                                        ? (o.unique && p.has(t)) || c.push(t)
                                        : t &&
                                          t.length &&
                                          "string" !== n &&
                                          i(t);
                                });
                            })(arguments),
                            i ? (r = c.length) : t && ((l = e), u(t))),
                        this
                    );
                },
                remove: function () {
                    return (
                        c &&
                            x.each(arguments, function (e, t) {
                                for (var n; -1 < (n = x.inArray(t, c, n)); )
                                    c.splice(n, 1),
                                        i && (n <= r && r--, n <= a && a--);
                            }),
                        this
                    );
                },
                has: function (e) {
                    return e ? -1 < x.inArray(e, c) : !(!c || !c.length);
                },
                empty: function () {
                    return (c = []), (r = 0), this;
                },
                disable: function () {
                    return (c = d = t = void 0), this;
                },
                disabled: function () {
                    return !c;
                },
                lock: function () {
                    return (d = void 0), t || p.disable(), this;
                },
                locked: function () {
                    return !d;
                },
                fireWith: function (e, t) {
                    return (
                        !c ||
                            (s && !d) ||
                            ((t = [e, (t = t || []).slice ? t.slice() : t]),
                            i ? d.push(t) : u(t)),
                        this
                    );
                },
                fire: function () {
                    return p.fireWith(this, arguments), this;
                },
                fired: function () {
                    return !!s;
                },
            };
        return p;
    }),
        x.extend({
            Deferred: function (e) {
                var s = [
                        [
                            "resolve",
                            "done",
                            x.Callbacks("once memory"),
                            "resolved",
                        ],
                        [
                            "reject",
                            "fail",
                            x.Callbacks("once memory"),
                            "rejected",
                        ],
                        ["notify", "progress", x.Callbacks("memory")],
                    ],
                    o = "pending",
                    r = {
                        state: function () {
                            return o;
                        },
                        always: function () {
                            return a.done(arguments).fail(arguments), this;
                        },
                        then: function () {
                            var o = arguments;
                            return x
                                .Deferred(function (i) {
                                    x.each(s, function (e, t) {
                                        var n = x.isFunction(o[e]) && o[e];
                                        a[t[1]](function () {
                                            var e =
                                                n && n.apply(this, arguments);
                                            e && x.isFunction(e.promise)
                                                ? e
                                                      .promise()
                                                      .done(i.resolve)
                                                      .fail(i.reject)
                                                      .progress(i.notify)
                                                : i[t[0] + "With"](
                                                      this === r
                                                          ? i.promise()
                                                          : this,
                                                      n ? [e] : arguments
                                                  );
                                        });
                                    }),
                                        (o = null);
                                })
                                .promise();
                        },
                        promise: function (e) {
                            return null != e ? x.extend(e, r) : r;
                        },
                    },
                    a = {};
                return (
                    (r.pipe = r.then),
                    x.each(s, function (e, t) {
                        var n = t[2],
                            i = t[3];
                        (r[t[1]] = n.add),
                            i &&
                                n.add(
                                    function () {
                                        o = i;
                                    },
                                    s[1 ^ e][2].disable,
                                    s[2][2].lock
                                ),
                            (a[t[0]] = function () {
                                return (
                                    a[t[0] + "With"](
                                        this === a ? r : this,
                                        arguments
                                    ),
                                    this
                                );
                            }),
                            (a[t[0] + "With"] = n.fireWith);
                    }),
                    r.promise(a),
                    e && e.call(a, a),
                    a
                );
            },
            when: function (e) {
                function t(t, n, i) {
                    return function (e) {
                        (n[t] = this),
                            (i[t] =
                                1 < arguments.length ? d.call(arguments) : e),
                            i === o
                                ? c.notifyWith(n, i)
                                : --l || c.resolveWith(n, i);
                    };
                }
                var o,
                    n,
                    i,
                    s = 0,
                    r = d.call(arguments),
                    a = r.length,
                    l = 1 !== a || (e && x.isFunction(e.promise)) ? a : 0,
                    c = 1 === l ? e : x.Deferred();
                if (1 < a)
                    for (
                        o = new Array(a), n = new Array(a), i = new Array(a);
                        s < a;
                        s++
                    )
                        r[s] && x.isFunction(r[s].promise)
                            ? r[s]
                                  .promise()
                                  .done(t(s, i, r))
                                  .fail(c.reject)
                                  .progress(t(s, n, o))
                            : --l;
                return l || c.resolveWith(i, r), c.promise();
            },
        }),
        (x.fn.ready = function (e) {
            return x.ready.promise().done(e), this;
        }),
        x.extend({
            isReady: !1,
            readyWait: 1,
            holdReady: function (e) {
                e ? x.readyWait++ : x.ready(!0);
            },
            ready: function (e) {
                if (!0 === e ? !--x.readyWait : !x.isReady) {
                    if (!T.body) return setTimeout(x.ready);
                    ((x.isReady = !0) !== e && 0 < --x.readyWait) ||
                        (A.resolveWith(T, [x]),
                        x.fn.triggerHandler &&
                            (x(T).triggerHandler("ready"), x(T).off("ready")));
                }
            },
        }),
        (x.ready.promise = function (e) {
            if (!A)
                if (((A = x.Deferred()), "complete" === T.readyState))
                    setTimeout(x.ready);
                else if (T.addEventListener)
                    T.addEventListener("DOMContentLoaded", H, !1),
                        h.addEventListener("load", H, !1);
                else {
                    T.attachEvent("onreadystatechange", H),
                        h.attachEvent("onload", H);
                    var n = !1;
                    try {
                        n = null == h.frameElement && T.documentElement;
                    } catch (e) {}
                    n &&
                        n.doScroll &&
                        !(function t() {
                            if (!x.isReady) {
                                try {
                                    n.doScroll("left");
                                } catch (e) {
                                    return setTimeout(t, 50);
                                }
                                N(), x.ready();
                            }
                        })();
                }
            return A.promise(e);
        });
    var O,
        P = "undefined";
    for (O in x(v)) break;
    (v.ownLast = "0" !== O),
        (v.inlineBlockNeedsLayout = !1),
        x(function () {
            var e,
                t,
                n = T.getElementsByTagName("body")[0];
            n &&
                n.style &&
                ((e = T.createElement("div")),
                ((t = T.createElement("div")).style.cssText =
                    "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
                n.appendChild(t).appendChild(e),
                typeof e.style.zoom !== P &&
                    ((e.style.cssText =
                        "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1"),
                    (v.inlineBlockNeedsLayout = e = 3 === e.offsetWidth),
                    e && (n.style.zoom = 1)),
                n.removeChild(t));
        }),
        (function () {
            var e = T.createElement("div");
            if (null == v.deleteExpando) {
                v.deleteExpando = !0;
                try {
                    delete e.test;
                } catch (e) {
                    v.deleteExpando = !1;
                }
            }
            e = null;
        })(),
        (x.acceptData = function (e) {
            var t = x.noData[(e.nodeName + " ").toLowerCase()],
                n = +e.nodeType || 1;
            return (
                (1 === n || 9 === n) &&
                (!t || (!0 !== t && e.getAttribute("classid") === t))
            );
        });
    var L = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        I = /([A-Z])/g;
    function M(e, t, n) {
        if (void 0 === n && 1 === e.nodeType) {
            var i = "data-" + t.replace(I, "-$1").toLowerCase();
            if ("string" == typeof (n = e.getAttribute(i))) {
                try {
                    n =
                        "true" === n ||
                        ("false" !== n &&
                            ("null" === n
                                ? null
                                : +n + "" === n
                                ? +n
                                : L.test(n)
                                ? x.parseJSON(n)
                                : n));
                } catch (e) {}
                x.data(e, t, n);
            } else n = void 0;
        }
        return n;
    }
    function q(e) {
        for (var t in e)
            if (("data" !== t || !x.isEmptyObject(e[t])) && "toJSON" !== t)
                return;
        return 1;
    }
    function W(e, t, n, i) {
        if (x.acceptData(e)) {
            var o,
                s = x.expando,
                r = e.nodeType,
                a = r ? x.cache : e,
                l = r ? e[s] : e[s] && s;
            if (
                (l && a[l] && (i || a[l].data)) ||
                void 0 !== n ||
                "string" != typeof t
            )
                return (
                    a[(l = l || (r ? (e[s] = u.pop() || x.guid++) : s))] ||
                        (a[l] = r ? {} : { toJSON: x.noop }),
                    ("object" != typeof t && "function" != typeof t) ||
                        (i
                            ? (a[l] = x.extend(a[l], t))
                            : (a[l].data = x.extend(a[l].data, t))),
                    (l = a[l]),
                    i || (l.data || (l.data = {}), (l = l.data)),
                    void 0 !== n && (l[x.camelCase(t)] = n),
                    "string" == typeof t
                        ? null == (o = l[t]) && (o = l[x.camelCase(t)])
                        : (o = l),
                    o
                );
        }
    }
    function z(e, t, n) {
        if (x.acceptData(e)) {
            var i,
                o,
                s = e.nodeType,
                r = s ? x.cache : e,
                a = s ? e[x.expando] : x.expando;
            if (r[a]) {
                if (t && (i = n ? r[a] : r[a].data)) {
                    o = (t = x.isArray(t)
                        ? t.concat(x.map(t, x.camelCase))
                        : t in i
                        ? [t]
                        : (t = x.camelCase(t)) in i
                        ? [t]
                        : t.split(" ")).length;
                    for (; o--; ) delete i[t[o]];
                    if (n ? !q(i) : !x.isEmptyObject(i)) return;
                }
                (n || (delete r[a].data, q(r[a]))) &&
                    (s
                        ? x.cleanData([e], !0)
                        : v.deleteExpando || r != r.window
                        ? delete r[a]
                        : (r[a] = null));
            }
        }
    }
    x.extend({
        cache: {},
        noData: {
            "applet ": !0,
            "embed ": !0,
            "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
        },
        hasData: function (e) {
            return (
                !!(e = e.nodeType ? x.cache[e[x.expando]] : e[x.expando]) &&
                !q(e)
            );
        },
        data: function (e, t, n) {
            return W(e, t, n);
        },
        removeData: function (e, t) {
            return z(e, t);
        },
        _data: function (e, t, n) {
            return W(e, t, n, !0);
        },
        _removeData: function (e, t) {
            return z(e, t, !0);
        },
    }),
        x.fn.extend({
            data: function (e, t) {
                var n,
                    i,
                    o,
                    s = this[0],
                    r = s && s.attributes;
                if (void 0 !== e)
                    return "object" == typeof e
                        ? this.each(function () {
                              x.data(this, e);
                          })
                        : 1 < arguments.length
                        ? this.each(function () {
                              x.data(this, e, t);
                          })
                        : s
                        ? M(s, e, x.data(s, e))
                        : void 0;
                if (
                    this.length &&
                    ((o = x.data(s)),
                    1 === s.nodeType && !x._data(s, "parsedAttrs"))
                ) {
                    for (n = r.length; n--; )
                        r[n] &&
                            0 === (i = r[n].name).indexOf("data-") &&
                            M(s, (i = x.camelCase(i.slice(5))), o[i]);
                    x._data(s, "parsedAttrs", !0);
                }
                return o;
            },
            removeData: function (e) {
                return this.each(function () {
                    x.removeData(this, e);
                });
            },
        }),
        x.extend({
            queue: function (e, t, n) {
                var i;
                return e
                    ? ((i = x._data(e, (t = (t || "fx") + "queue"))),
                      n &&
                          (!i || x.isArray(n)
                              ? (i = x._data(e, t, x.makeArray(n)))
                              : i.push(n)),
                      i || [])
                    : void 0;
            },
            dequeue: function (e, t) {
                var n = x.queue(e, (t = t || "fx")),
                    i = n.length,
                    o = n.shift(),
                    s = x._queueHooks(e, t);
                "inprogress" === o && ((o = n.shift()), i--),
                    o &&
                        ("fx" === t && n.unshift("inprogress"),
                        delete s.stop,
                        o.call(
                            e,
                            function () {
                                x.dequeue(e, t);
                            },
                            s
                        )),
                    !i && s && s.empty.fire();
            },
            _queueHooks: function (e, t) {
                var n = t + "queueHooks";
                return (
                    x._data(e, n) ||
                    x._data(e, n, {
                        empty: x.Callbacks("once memory").add(function () {
                            x._removeData(e, t + "queue"), x._removeData(e, n);
                        }),
                    })
                );
            },
        }),
        x.fn.extend({
            queue: function (t, n) {
                var e = 2;
                return (
                    "string" != typeof t && ((n = t), (t = "fx"), e--),
                    arguments.length < e
                        ? x.queue(this[0], t)
                        : void 0 === n
                        ? this
                        : this.each(function () {
                              var e = x.queue(this, t, n);
                              x._queueHooks(this, t),
                                  "fx" === t &&
                                      "inprogress" !== e[0] &&
                                      x.dequeue(this, t);
                          })
                );
            },
            dequeue: function (e) {
                return this.each(function () {
                    x.dequeue(this, e);
                });
            },
            clearQueue: function (e) {
                return this.queue(e || "fx", []);
            },
            promise: function (e, t) {
                function n() {
                    --o || s.resolveWith(r, [r]);
                }
                var i,
                    o = 1,
                    s = x.Deferred(),
                    r = this,
                    a = this.length;
                for (
                    "string" != typeof e && ((t = e), (e = void 0)),
                        e = e || "fx";
                    a--;

                )
                    (i = x._data(r[a], e + "queueHooks")) &&
                        i.empty &&
                        (o++, i.empty.add(n));
                return n(), s.promise(t);
            },
        });
    function F(e, t) {
        return (
            "none" === x.css((e = t || e), "display") ||
            !x.contains(e.ownerDocument, e)
        );
    }
    var R = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        B = ["Top", "Right", "Bottom", "Left"],
        U = (x.access = function (e, t, n, i, o, s, r) {
            var a = 0,
                l = e.length,
                c = null == n;
            if ("object" === x.type(n))
                for (a in ((o = !0), n)) x.access(e, t, a, n[a], !0, s, r);
            else if (
                void 0 !== i &&
                ((o = !0),
                x.isFunction(i) || (r = !0),
                (t = c
                    ? r
                        ? (t.call(e, i), null)
                        : ((c = t),
                          function (e, t, n) {
                              return c.call(x(e), n);
                          })
                    : t))
            )
                for (; a < l; a++)
                    t(e[a], n, r ? i : i.call(e[a], a, t(e[a], n)));
            return o ? e : c ? t.call(e) : l ? t(e[0], n) : s;
        }),
        X = /^(?:checkbox|radio)$/i;
    !(function () {
        var e = T.createElement("input"),
            t = T.createElement("div"),
            n = T.createDocumentFragment();
        if (
            ((t.innerHTML =
                "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
            (v.leadingWhitespace = 3 === t.firstChild.nodeType),
            (v.tbody = !t.getElementsByTagName("tbody").length),
            (v.htmlSerialize = !!t.getElementsByTagName("link").length),
            (v.html5Clone =
                "<:nav></:nav>" !==
                T.createElement("nav").cloneNode(!0).outerHTML),
            (e.type = "checkbox"),
            (e.checked = !0),
            n.appendChild(e),
            (v.appendChecked = e.checked),
            (t.innerHTML = "<textarea>x</textarea>"),
            (v.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue),
            n.appendChild(t),
            (t.innerHTML = "<input type='radio' checked='checked' name='t'/>"),
            (v.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked),
            (v.noCloneEvent = !0),
            t.attachEvent &&
                (t.attachEvent("onclick", function () {
                    v.noCloneEvent = !1;
                }),
                t.cloneNode(!0).click()),
            null == v.deleteExpando)
        ) {
            v.deleteExpando = !0;
            try {
                delete t.test;
            } catch (e) {
                v.deleteExpando = !1;
            }
        }
    })(),
        (function () {
            var e,
                t,
                n = T.createElement("div");
            for (e in { submit: !0, change: !0, focusin: !0 })
                (t = "on" + e),
                    (v[e + "Bubbles"] = t in h) ||
                        (n.setAttribute(t, "t"),
                        (v[e + "Bubbles"] = !1 === n.attributes[t].expando));
            n = null;
        })();
    var V = /^(?:input|select|textarea)$/i,
        Y = /^key/,
        J = /^(?:mouse|pointer|contextmenu)|click/,
        G = /^(?:focusinfocus|focusoutblur)$/,
        Q = /^([^.]*)(?:\.(.+)|)$/;
    function K() {
        return !0;
    }
    function Z() {
        return !1;
    }
    function ee() {
        try {
            return T.activeElement;
        } catch (e) {}
    }
    function te(e) {
        var t = ne.split("|"),
            n = e.createDocumentFragment();
        if (n.createElement) for (; t.length; ) n.createElement(t.pop());
        return n;
    }
    (x.event = {
        global: {},
        add: function (e, t, n, i, o) {
            var s,
                r,
                a,
                l,
                c,
                d,
                u,
                p,
                f,
                h = x._data(e);
            if (h) {
                for (
                    n.handler && ((n = (a = n).handler), (o = a.selector)),
                        n.guid || (n.guid = x.guid++),
                        (s = h.events) || (s = h.events = {}),
                        (c = h.handle) ||
                            ((c = h.handle =
                                function (e) {
                                    return typeof x === P ||
                                        (e && x.event.triggered === e.type)
                                        ? void 0
                                        : x.event.dispatch.apply(
                                              c.elem,
                                              arguments
                                          );
                                }).elem = e),
                        r = (t = (t || "").match(E) || [""]).length;
                    r--;

                )
                    (u = f = (d = Q.exec(t[r]) || [])[1]),
                        (p = (d[2] || "").split(".").sort()),
                        u &&
                            ((l = x.event.special[u] || {}),
                            (u = (o ? l.delegateType : l.bindType) || u),
                            (l = x.event.special[u] || {}),
                            (d = x.extend(
                                {
                                    type: u,
                                    origType: f,
                                    data: i,
                                    handler: n,
                                    guid: n.guid,
                                    selector: o,
                                    needsContext:
                                        o && x.expr.match.needsContext.test(o),
                                    namespace: p.join("."),
                                },
                                a
                            )),
                            (f = s[u]) ||
                                (((f = s[u] = []).delegateCount = 0),
                                (l.setup && !1 !== l.setup.call(e, i, p, c)) ||
                                    (e.addEventListener
                                        ? e.addEventListener(u, c, !1)
                                        : e.attachEvent &&
                                          e.attachEvent("on" + u, c))),
                            l.add &&
                                (l.add.call(e, d),
                                d.handler.guid || (d.handler.guid = n.guid)),
                            o ? f.splice(f.delegateCount++, 0, d) : f.push(d),
                            (x.event.global[u] = !0));
                e = null;
            }
        },
        remove: function (e, t, n, i, o) {
            var s,
                r,
                a,
                l,
                c,
                d,
                u,
                p,
                f,
                h,
                m,
                g = x.hasData(e) && x._data(e);
            if (g && (d = g.events)) {
                for (c = (t = (t || "").match(E) || [""]).length; c--; )
                    if (
                        ((f = m = (a = Q.exec(t[c]) || [])[1]),
                        (h = (a[2] || "").split(".").sort()),
                        f)
                    ) {
                        for (
                            u = x.event.special[f] || {},
                                p =
                                    d[
                                        (f =
                                            (i ? u.delegateType : u.bindType) ||
                                            f)
                                    ] || [],
                                a =
                                    a[2] &&
                                    new RegExp(
                                        "(^|\\.)" +
                                            h.join("\\.(?:.*\\.|)") +
                                            "(\\.|$)"
                                    ),
                                l = s = p.length;
                            s--;

                        )
                            (r = p[s]),
                                (!o && m !== r.origType) ||
                                    (n && n.guid !== r.guid) ||
                                    (a && !a.test(r.namespace)) ||
                                    (i &&
                                        i !== r.selector &&
                                        ("**" !== i || !r.selector)) ||
                                    (p.splice(s, 1),
                                    r.selector && p.delegateCount--,
                                    u.remove && u.remove.call(e, r));
                        l &&
                            !p.length &&
                            ((u.teardown &&
                                !1 !== u.teardown.call(e, h, g.handle)) ||
                                x.removeEvent(e, f, g.handle),
                            delete d[f]);
                    } else for (f in d) x.event.remove(e, f + t[c], n, i, !0);
                x.isEmptyObject(d) &&
                    (delete g.handle, x._removeData(e, "events"));
            }
        },
        trigger: function (e, t, n, i) {
            var o,
                s,
                r,
                a,
                l,
                c,
                d = [n || T],
                u = g.call(e, "type") ? e.type : e,
                p = g.call(e, "namespace") ? e.namespace.split(".") : [],
                f = (l = n = n || T);
            if (
                3 !== n.nodeType &&
                8 !== n.nodeType &&
                !G.test(u + x.event.triggered) &&
                (0 <= u.indexOf(".") &&
                    ((u = (p = u.split(".")).shift()), p.sort()),
                (s = u.indexOf(":") < 0 && "on" + u),
                ((e = e[x.expando]
                    ? e
                    : new x.Event(u, "object" == typeof e && e)).isTrigger = i
                    ? 2
                    : 3),
                (e.namespace = p.join(".")),
                (e.namespace_re = e.namespace
                    ? new RegExp(
                          "(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"
                      )
                    : null),
                (e.result = void 0),
                e.target || (e.target = n),
                (t = null == t ? [e] : x.makeArray(t, [e])),
                (a = x.event.special[u] || {}),
                i || !a.trigger || !1 !== a.trigger.apply(n, t))
            ) {
                if (!i && !a.noBubble && !x.isWindow(n)) {
                    for (
                        r = a.delegateType || u,
                            G.test(r + u) || (f = f.parentNode);
                        f;
                        f = f.parentNode
                    )
                        d.push(f), (l = f);
                    l === (n.ownerDocument || T) &&
                        d.push(l.defaultView || l.parentWindow || h);
                }
                for (c = 0; (f = d[c++]) && !e.isPropagationStopped(); )
                    (e.type = 1 < c ? r : a.bindType || u),
                        (o =
                            (x._data(f, "events") || {})[e.type] &&
                            x._data(f, "handle")) && o.apply(f, t),
                        (o = s && f[s]) &&
                            o.apply &&
                            x.acceptData(f) &&
                            ((e.result = o.apply(f, t)),
                            !1 === e.result && e.preventDefault());
                if (
                    ((e.type = u),
                    !i &&
                        !e.isDefaultPrevented() &&
                        (!a._default || !1 === a._default.apply(d.pop(), t)) &&
                        x.acceptData(n) &&
                        s &&
                        n[u] &&
                        !x.isWindow(n))
                ) {
                    (l = n[s]) && (n[s] = null), (x.event.triggered = u);
                    try {
                        n[u]();
                    } catch (e) {}
                    (x.event.triggered = void 0), l && (n[s] = l);
                }
                return e.result;
            }
        },
        dispatch: function (e) {
            e = x.event.fix(e);
            var t,
                n,
                i,
                o,
                s,
                r = d.call(arguments),
                a = (x._data(this, "events") || {})[e.type] || [],
                l = x.event.special[e.type] || {};
            if (
                (((r[0] = e).delegateTarget = this),
                !l.preDispatch || !1 !== l.preDispatch.call(this, e))
            ) {
                for (
                    s = x.event.handlers.call(this, e, a), t = 0;
                    (i = s[t++]) && !e.isPropagationStopped();

                )
                    for (
                        e.currentTarget = i.elem, o = 0;
                        (n = i.handlers[o++]) &&
                        !e.isImmediatePropagationStopped();

                    )
                        (e.namespace_re && !e.namespace_re.test(n.namespace)) ||
                            ((e.handleObj = n),
                            (e.data = n.data),
                            void 0 !==
                                (n = (
                                    (x.event.special[n.origType] || {})
                                        .handle || n.handler
                                ).apply(i.elem, r)) &&
                                !1 === (e.result = n) &&
                                (e.preventDefault(), e.stopPropagation()));
                return l.postDispatch && l.postDispatch.call(this, e), e.result;
            }
        },
        handlers: function (e, t) {
            var n,
                i,
                o,
                s,
                r = [],
                a = t.delegateCount,
                l = e.target;
            if (a && l.nodeType && (!e.button || "click" !== e.type))
                for (; l != this; l = l.parentNode || this)
                    if (
                        1 === l.nodeType &&
                        (!0 !== l.disabled || "click" !== e.type)
                    ) {
                        for (o = [], s = 0; s < a; s++)
                            void 0 === o[(n = (i = t[s]).selector + " ")] &&
                                (o[n] = i.needsContext
                                    ? 0 <= x(n, this).index(l)
                                    : x.find(n, this, null, [l]).length),
                                o[n] && o.push(i);
                        o.length && r.push({ elem: l, handlers: o });
                    }
            return (
                a < t.length && r.push({ elem: this, handlers: t.slice(a) }), r
            );
        },
        fix: function (e) {
            if (e[x.expando]) return e;
            var t,
                n,
                i,
                o = e.type,
                s = e,
                r = this.fixHooks[o];
            for (
                r ||
                    (this.fixHooks[o] = r =
                        J.test(o)
                            ? this.mouseHooks
                            : Y.test(o)
                            ? this.keyHooks
                            : {}),
                    i = r.props ? this.props.concat(r.props) : this.props,
                    e = new x.Event(s),
                    t = i.length;
                t--;

            )
                e[(n = i[t])] = s[n];
            return (
                e.target || (e.target = s.srcElement || T),
                3 === e.target.nodeType && (e.target = e.target.parentNode),
                (e.metaKey = !!e.metaKey),
                r.filter ? r.filter(e, s) : e
            );
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(
            " "
        ),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "),
            filter: function (e, t) {
                return (
                    null == e.which &&
                        (e.which = null != t.charCode ? t.charCode : t.keyCode),
                    e
                );
            },
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(
                " "
            ),
            filter: function (e, t) {
                var n,
                    i,
                    o = t.button,
                    s = t.fromElement;
                return (
                    null == e.pageX &&
                        null != t.clientX &&
                        ((i = (n = e.target.ownerDocument || T)
                            .documentElement),
                        (n = n.body),
                        (e.pageX =
                            t.clientX +
                            ((i && i.scrollLeft) || (n && n.scrollLeft) || 0) -
                            ((i && i.clientLeft) || (n && n.clientLeft) || 0)),
                        (e.pageY =
                            t.clientY +
                            ((i && i.scrollTop) || (n && n.scrollTop) || 0) -
                            ((i && i.clientTop) || (n && n.clientTop) || 0))),
                    !e.relatedTarget &&
                        s &&
                        (e.relatedTarget = s === e.target ? t.toElement : s),
                    e.which ||
                        void 0 === o ||
                        (e.which = 1 & o ? 1 : 2 & o ? 3 : 4 & o ? 2 : 0),
                    e
                );
            },
        },
        special: {
            load: { noBubble: !0 },
            focus: {
                trigger: function () {
                    if (this !== ee() && this.focus)
                        try {
                            return this.focus(), !1;
                        } catch (e) {}
                },
                delegateType: "focusin",
            },
            blur: {
                trigger: function () {
                    return this === ee() && this.blur
                        ? (this.blur(), !1)
                        : void 0;
                },
                delegateType: "focusout",
            },
            click: {
                trigger: function () {
                    return x.nodeName(this, "input") &&
                        "checkbox" === this.type &&
                        this.click
                        ? (this.click(), !1)
                        : void 0;
                },
                _default: function (e) {
                    return x.nodeName(e.target, "a");
                },
            },
            beforeunload: {
                postDispatch: function (e) {
                    void 0 !== e.result &&
                        e.originalEvent &&
                        (e.originalEvent.returnValue = e.result);
                },
            },
        },
        simulate: function (e, t, n, i) {
            e = x.extend(new x.Event(), n, {
                type: e,
                isSimulated: !0,
                originalEvent: {},
            });
            i ? x.event.trigger(e, null, t) : x.event.dispatch.call(t, e),
                e.isDefaultPrevented() && n.preventDefault();
        },
    }),
        (x.removeEvent = T.removeEventListener
            ? function (e, t, n) {
                  e.removeEventListener && e.removeEventListener(t, n, !1);
              }
            : function (e, t, n) {
                  t = "on" + t;
                  e.detachEvent &&
                      (typeof e[t] === P && (e[t] = null), e.detachEvent(t, n));
              }),
        (x.Event = function (e, t) {
            return this instanceof x.Event
                ? (e && e.type
                      ? ((this.originalEvent = e),
                        (this.type = e.type),
                        (this.isDefaultPrevented =
                            e.defaultPrevented ||
                            (void 0 === e.defaultPrevented &&
                                !1 === e.returnValue)
                                ? K
                                : Z))
                      : (this.type = e),
                  t && x.extend(this, t),
                  (this.timeStamp = (e && e.timeStamp) || x.now()),
                  void (this[x.expando] = !0))
                : new x.Event(e, t);
        }),
        (x.Event.prototype = {
            isDefaultPrevented: Z,
            isPropagationStopped: Z,
            isImmediatePropagationStopped: Z,
            preventDefault: function () {
                var e = this.originalEvent;
                (this.isDefaultPrevented = K),
                    e &&
                        (e.preventDefault
                            ? e.preventDefault()
                            : (e.returnValue = !1));
            },
            stopPropagation: function () {
                var e = this.originalEvent;
                (this.isPropagationStopped = K),
                    e &&
                        (e.stopPropagation && e.stopPropagation(),
                        (e.cancelBubble = !0));
            },
            stopImmediatePropagation: function () {
                var e = this.originalEvent;
                (this.isImmediatePropagationStopped = K),
                    e &&
                        e.stopImmediatePropagation &&
                        e.stopImmediatePropagation(),
                    this.stopPropagation();
            },
        }),
        x.each(
            {
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout",
            },
            function (e, o) {
                x.event.special[e] = {
                    delegateType: o,
                    bindType: o,
                    handle: function (e) {
                        var t,
                            n = e.relatedTarget,
                            i = e.handleObj;
                        return (
                            (n && (n === this || x.contains(this, n))) ||
                                ((e.type = i.origType),
                                (t = i.handler.apply(this, arguments)),
                                (e.type = o)),
                            t
                        );
                    },
                };
            }
        ),
        v.submitBubbles ||
            (x.event.special.submit = {
                setup: function () {
                    return (
                        !x.nodeName(this, "form") &&
                        void x.event.add(
                            this,
                            "click._submit keypress._submit",
                            function (e) {
                                (e = e.target),
                                    (e =
                                        x.nodeName(e, "input") ||
                                        x.nodeName(e, "button")
                                            ? e.form
                                            : void 0);
                                e &&
                                    !x._data(e, "submitBubbles") &&
                                    (x.event.add(
                                        e,
                                        "submit._submit",
                                        function (e) {
                                            e._submit_bubble = !0;
                                        }
                                    ),
                                    x._data(e, "submitBubbles", !0));
                            }
                        )
                    );
                },
                postDispatch: function (e) {
                    e._submit_bubble &&
                        (delete e._submit_bubble,
                        this.parentNode &&
                            !e.isTrigger &&
                            x.event.simulate("submit", this.parentNode, e, !0));
                },
                teardown: function () {
                    return (
                        !x.nodeName(this, "form") &&
                        void x.event.remove(this, "._submit")
                    );
                },
            }),
        v.changeBubbles ||
            (x.event.special.change = {
                setup: function () {
                    return V.test(this.nodeName)
                        ? (("checkbox" !== this.type &&
                              "radio" !== this.type) ||
                              (x.event.add(
                                  this,
                                  "propertychange._change",
                                  function (e) {
                                      "checked" ===
                                          e.originalEvent.propertyName &&
                                          (this._just_changed = !0);
                                  }
                              ),
                              x.event.add(this, "click._change", function (e) {
                                  this._just_changed &&
                                      !e.isTrigger &&
                                      (this._just_changed = !1),
                                      x.event.simulate("change", this, e, !0);
                              })),
                          !1)
                        : void x.event.add(
                              this,
                              "beforeactivate._change",
                              function (e) {
                                  e = e.target;
                                  V.test(e.nodeName) &&
                                      !x._data(e, "changeBubbles") &&
                                      (x.event.add(
                                          e,
                                          "change._change",
                                          function (e) {
                                              !this.parentNode ||
                                                  e.isSimulated ||
                                                  e.isTrigger ||
                                                  x.event.simulate(
                                                      "change",
                                                      this.parentNode,
                                                      e,
                                                      !0
                                                  );
                                          }
                                      ),
                                      x._data(e, "changeBubbles", !0));
                              }
                          );
                },
                handle: function (e) {
                    var t = e.target;
                    return this !== t ||
                        e.isSimulated ||
                        e.isTrigger ||
                        ("radio" !== t.type && "checkbox" !== t.type)
                        ? e.handleObj.handler.apply(this, arguments)
                        : void 0;
                },
                teardown: function () {
                    return (
                        x.event.remove(this, "._change"), !V.test(this.nodeName)
                    );
                },
            }),
        v.focusinBubbles ||
            x.each({ focus: "focusin", blur: "focusout" }, function (n, i) {
                function o(e) {
                    x.event.simulate(i, e.target, x.event.fix(e), !0);
                }
                x.event.special[i] = {
                    setup: function () {
                        var e = this.ownerDocument || this,
                            t = x._data(e, i);
                        t || e.addEventListener(n, o, !0),
                            x._data(e, i, (t || 0) + 1);
                    },
                    teardown: function () {
                        var e = this.ownerDocument || this,
                            t = x._data(e, i) - 1;
                        t
                            ? x._data(e, i, t)
                            : (e.removeEventListener(n, o, !0),
                              x._removeData(e, i));
                    },
                };
            }),
        x.fn.extend({
            on: function (e, t, n, i, o) {
                var s, r;
                if ("object" == typeof e) {
                    for (s in ("string" != typeof t &&
                        ((n = n || t), (t = void 0)),
                    e))
                        this.on(s, t, n, e[s], o);
                    return this;
                }
                if (
                    (null == n && null == i
                        ? ((i = t), (n = t = void 0))
                        : null == i &&
                          ("string" == typeof t
                              ? ((i = n), (n = void 0))
                              : ((i = n), (n = t), (t = void 0))),
                    !1 === i)
                )
                    i = Z;
                else if (!i) return this;
                return (
                    1 === o &&
                        ((r = i),
                        ((i = function (e) {
                            return x().off(e), r.apply(this, arguments);
                        }).guid = r.guid || (r.guid = x.guid++))),
                    this.each(function () {
                        x.event.add(this, e, i, n, t);
                    })
                );
            },
            one: function (e, t, n, i) {
                return this.on(e, t, n, i, 1);
            },
            off: function (e, t, n) {
                var i, o;
                if (e && e.preventDefault && e.handleObj)
                    return (
                        (i = e.handleObj),
                        x(e.delegateTarget).off(
                            i.namespace
                                ? i.origType + "." + i.namespace
                                : i.origType,
                            i.selector,
                            i.handler
                        ),
                        this
                    );
                if ("object" != typeof e)
                    return (
                        (!1 !== t && "function" != typeof t) ||
                            ((n = t), (t = void 0)),
                        !1 === n && (n = Z),
                        this.each(function () {
                            x.event.remove(this, e, n, t);
                        })
                    );
                for (o in e) this.off(o, t, e[o]);
                return this;
            },
            trigger: function (e, t) {
                return this.each(function () {
                    x.event.trigger(e, t, this);
                });
            },
            triggerHandler: function (e, t) {
                var n = this[0];
                return n ? x.event.trigger(e, t, n, !0) : void 0;
            },
        });
    var ne =
            "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
        ie = / jQuery\d+="(?:null|\d+)"/g,
        oe = new RegExp("<(?:" + ne + ")[\\s/>]", "i"),
        se = /^\s+/,
        re =
            /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
        ae = /<([\w:]+)/,
        le = /<tbody/i,
        ce = /<|&#?\w+;/,
        de = /<(?:script|style|link)/i,
        ue = /checked\s*(?:[^=]|=\s*.checked.)/i,
        pe = /^$|\/(?:java|ecma)script/i,
        fe = /^true\/(.*)/,
        he = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
        me = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            legend: [1, "<fieldset>", "</fieldset>"],
            area: [1, "<map>", "</map>"],
            param: [1, "<object>", "</object>"],
            thead: [1, "<table>", "</table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: v.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"],
        },
        ge = te(T).appendChild(T.createElement("div"));
    function ve(e, t) {
        var n,
            i,
            o = 0,
            s =
                typeof e.getElementsByTagName !== P
                    ? e.getElementsByTagName(t || "*")
                    : typeof e.querySelectorAll !== P
                    ? e.querySelectorAll(t || "*")
                    : void 0;
        if (!s)
            for (s = [], n = e.childNodes || e; null != (i = n[o]); o++)
                !t || x.nodeName(i, t) ? s.push(i) : x.merge(s, ve(i, t));
        return void 0 === t || (t && x.nodeName(e, t)) ? x.merge([e], s) : s;
    }
    function ye(e) {
        X.test(e.type) && (e.defaultChecked = e.checked);
    }
    function be(e, t) {
        return x.nodeName(e, "table") &&
            x.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr")
            ? e.getElementsByTagName("tbody")[0] ||
                  e.appendChild(e.ownerDocument.createElement("tbody"))
            : e;
    }
    function we(e) {
        return (e.type = (null !== x.find.attr(e, "type")) + "/" + e.type), e;
    }
    function xe(e) {
        var t = fe.exec(e.type);
        return t ? (e.type = t[1]) : e.removeAttribute("type"), e;
    }
    function ke(e, t) {
        for (var n, i = 0; null != (n = e[i]); i++)
            x._data(n, "globalEval", !t || x._data(t[i], "globalEval"));
    }
    function Te(e, t) {
        if (1 === t.nodeType && x.hasData(e)) {
            var n,
                i,
                o,
                s = x._data(e),
                e = x._data(t, s),
                r = s.events;
            if (r)
                for (n in (delete e.handle, (e.events = {}), r))
                    for (i = 0, o = r[n].length; i < o; i++)
                        x.event.add(t, n, r[n][i]);
            e.data && (e.data = x.extend({}, e.data));
        }
    }
    (me.optgroup = me.option),
        (me.tbody = me.tfoot = me.colgroup = me.caption = me.thead),
        (me.th = me.td),
        x.extend({
            clone: function (e, t, n) {
                var i,
                    o,
                    s,
                    r,
                    a,
                    l = x.contains(e.ownerDocument, e);
                if (
                    (v.html5Clone ||
                    x.isXMLDoc(e) ||
                    !oe.test("<" + e.nodeName + ">")
                        ? (s = e.cloneNode(!0))
                        : ((ge.innerHTML = e.outerHTML),
                          ge.removeChild((s = ge.firstChild))),
                    !(
                        (v.noCloneEvent && v.noCloneChecked) ||
                        (1 !== e.nodeType && 11 !== e.nodeType) ||
                        x.isXMLDoc(e)
                    ))
                )
                    for (i = ve(s), a = ve(e), r = 0; null != (o = a[r]); ++r)
                        i[r] &&
                            (function (e, t) {
                                var n, i, o;
                                if (1 === t.nodeType) {
                                    if (
                                        ((n = t.nodeName.toLowerCase()),
                                        !v.noCloneEvent && t[x.expando])
                                    ) {
                                        for (i in (o = x._data(t)).events)
                                            x.removeEvent(t, i, o.handle);
                                        t.removeAttribute(x.expando);
                                    }
                                    "script" === n && t.text !== e.text
                                        ? ((we(t).text = e.text), xe(t))
                                        : "object" === n
                                        ? (t.parentNode &&
                                              (t.outerHTML = e.outerHTML),
                                          v.html5Clone &&
                                              e.innerHTML &&
                                              !x.trim(t.innerHTML) &&
                                              (t.innerHTML = e.innerHTML))
                                        : "input" === n && X.test(e.type)
                                        ? ((t.defaultChecked = t.checked =
                                              e.checked),
                                          t.value !== e.value &&
                                              (t.value = e.value))
                                        : "option" === n
                                        ? (t.defaultSelected = t.selected =
                                              e.defaultSelected)
                                        : ("input" !== n && "textarea" !== n) ||
                                          (t.defaultValue = e.defaultValue);
                                }
                            })(o, i[r]);
                if (t)
                    if (n)
                        for (
                            a = a || ve(e), i = i || ve(s), r = 0;
                            null != (o = a[r]);
                            r++
                        )
                            Te(o, i[r]);
                    else Te(e, s);
                return (
                    0 < (i = ve(s, "script")).length &&
                        ke(i, !l && ve(e, "script")),
                    (i = a = o = null),
                    s
                );
            },
            buildFragment: function (e, t, n, i) {
                for (
                    var o,
                        s,
                        r,
                        a,
                        l,
                        c,
                        d,
                        u = e.length,
                        p = te(t),
                        f = [],
                        h = 0;
                    h < u;
                    h++
                )
                    if ((s = e[h]) || 0 === s)
                        if ("object" === x.type(s))
                            x.merge(f, s.nodeType ? [s] : s);
                        else if (ce.test(s)) {
                            for (
                                a = a || p.appendChild(t.createElement("div")),
                                    l = (ae.exec(s) || [
                                        "",
                                        "",
                                    ])[1].toLowerCase(),
                                    d = me[l] || me._default,
                                    a.innerHTML =
                                        d[1] +
                                        s.replace(re, "<$1></$2>") +
                                        d[2],
                                    o = d[0];
                                o--;

                            )
                                a = a.lastChild;
                            if (
                                (!v.leadingWhitespace &&
                                    se.test(s) &&
                                    f.push(t.createTextNode(se.exec(s)[0])),
                                !v.tbody)
                            )
                                for (
                                    o =
                                        (s =
                                            "table" !== l || le.test(s)
                                                ? "<table>" !== d[1] ||
                                                  le.test(s)
                                                    ? 0
                                                    : a
                                                : a.firstChild) &&
                                        s.childNodes.length;
                                    o--;

                                )
                                    x.nodeName(
                                        (c = s.childNodes[o]),
                                        "tbody"
                                    ) &&
                                        !c.childNodes.length &&
                                        s.removeChild(c);
                            for (
                                x.merge(f, a.childNodes), a.textContent = "";
                                a.firstChild;

                            )
                                a.removeChild(a.firstChild);
                            a = p.lastChild;
                        } else f.push(t.createTextNode(s));
                for (
                    a && p.removeChild(a),
                        v.appendChecked || x.grep(ve(f, "input"), ye),
                        h = 0;
                    (s = f[h++]);

                )
                    if (
                        (!i || -1 === x.inArray(s, i)) &&
                        ((r = x.contains(s.ownerDocument, s)),
                        (a = ve(p.appendChild(s), "script")),
                        r && ke(a),
                        n)
                    )
                        for (o = 0; (s = a[o++]); )
                            pe.test(s.type || "") && n.push(s);
                return (a = null), p;
            },
            cleanData: function (e, t) {
                for (
                    var n,
                        i,
                        o,
                        s,
                        r = 0,
                        a = x.expando,
                        l = x.cache,
                        c = v.deleteExpando,
                        d = x.event.special;
                    null != (n = e[r]);
                    r++
                )
                    if ((t || x.acceptData(n)) && (s = (o = n[a]) && l[o])) {
                        if (s.events)
                            for (i in s.events)
                                d[i]
                                    ? x.event.remove(n, i)
                                    : x.removeEvent(n, i, s.handle);
                        l[o] &&
                            (delete l[o],
                            c
                                ? delete n[a]
                                : typeof n.removeAttribute !== P
                                ? n.removeAttribute(a)
                                : (n[a] = null),
                            u.push(o));
                    }
            },
        }),
        x.fn.extend({
            text: function (e) {
                return U(
                    this,
                    function (e) {
                        return void 0 === e
                            ? x.text(this)
                            : this.empty().append(
                                  (
                                      (this[0] && this[0].ownerDocument) ||
                                      T
                                  ).createTextNode(e)
                              );
                    },
                    null,
                    e,
                    arguments.length
                );
            },
            append: function () {
                return this.domManip(arguments, function (e) {
                    (1 !== this.nodeType &&
                        11 !== this.nodeType &&
                        9 !== this.nodeType) ||
                        be(this, e).appendChild(e);
                });
            },
            prepend: function () {
                return this.domManip(arguments, function (e) {
                    var t;
                    (1 !== this.nodeType &&
                        11 !== this.nodeType &&
                        9 !== this.nodeType) ||
                        (t = be(this, e)).insertBefore(e, t.firstChild);
                });
            },
            before: function () {
                return this.domManip(arguments, function (e) {
                    this.parentNode && this.parentNode.insertBefore(e, this);
                });
            },
            after: function () {
                return this.domManip(arguments, function (e) {
                    this.parentNode &&
                        this.parentNode.insertBefore(e, this.nextSibling);
                });
            },
            remove: function (e, t) {
                for (
                    var n, i = e ? x.filter(e, this) : this, o = 0;
                    null != (n = i[o]);
                    o++
                )
                    t || 1 !== n.nodeType || x.cleanData(ve(n)),
                        n.parentNode &&
                            (t &&
                                x.contains(n.ownerDocument, n) &&
                                ke(ve(n, "script")),
                            n.parentNode.removeChild(n));
                return this;
            },
            empty: function () {
                for (var e, t = 0; null != (e = this[t]); t++) {
                    for (
                        1 === e.nodeType && x.cleanData(ve(e, !1));
                        e.firstChild;

                    )
                        e.removeChild(e.firstChild);
                    e.options &&
                        x.nodeName(e, "select") &&
                        (e.options.length = 0);
                }
                return this;
            },
            clone: function (e, t) {
                return (
                    (e = null != e && e),
                    (t = null == t ? e : t),
                    this.map(function () {
                        return x.clone(this, e, t);
                    })
                );
            },
            html: function (e) {
                return U(
                    this,
                    function (e) {
                        var t = this[0] || {},
                            n = 0,
                            i = this.length;
                        if (void 0 === e)
                            return 1 === t.nodeType
                                ? t.innerHTML.replace(ie, "")
                                : void 0;
                        if (
                            !(
                                "string" != typeof e ||
                                de.test(e) ||
                                (!v.htmlSerialize && oe.test(e)) ||
                                (!v.leadingWhitespace && se.test(e)) ||
                                me[(ae.exec(e) || ["", ""])[1].toLowerCase()]
                            )
                        ) {
                            e = e.replace(re, "<$1></$2>");
                            try {
                                for (; n < i; n++)
                                    1 === (t = this[n] || {}).nodeType &&
                                        (x.cleanData(ve(t, !1)),
                                        (t.innerHTML = e));
                                t = 0;
                            } catch (e) {}
                        }
                        t && this.empty().append(e);
                    },
                    null,
                    e,
                    arguments.length
                );
            },
            replaceWith: function () {
                var t = arguments[0];
                return (
                    this.domManip(arguments, function (e) {
                        (t = this.parentNode),
                            x.cleanData(ve(this)),
                            t && t.replaceChild(e, this);
                    }),
                    t && (t.length || t.nodeType) ? this : this.remove()
                );
            },
            detach: function (e) {
                return this.remove(e, !0);
            },
            domManip: function (n, i) {
                n = m.apply([], n);
                var e,
                    t,
                    o,
                    s,
                    r,
                    a,
                    l = 0,
                    c = this.length,
                    d = this,
                    u = c - 1,
                    p = n[0],
                    f = x.isFunction(p);
                if (
                    f ||
                    (1 < c &&
                        "string" == typeof p &&
                        !v.checkClone &&
                        ue.test(p))
                )
                    return this.each(function (e) {
                        var t = d.eq(e);
                        f && (n[0] = p.call(this, e, t.html())),
                            t.domManip(n, i);
                    });
                if (
                    c &&
                    ((e = (a = x.buildFragment(
                        n,
                        this[0].ownerDocument,
                        !1,
                        this
                    )).firstChild),
                    1 === a.childNodes.length && (a = e),
                    e)
                ) {
                    for (
                        o = (s = x.map(ve(a, "script"), we)).length;
                        l < c;
                        l++
                    )
                        (t = a),
                            l !== u &&
                                ((t = x.clone(t, !0, !0)),
                                o && x.merge(s, ve(t, "script"))),
                            i.call(this[l], t, l);
                    if (o)
                        for (
                            r = s[s.length - 1].ownerDocument,
                                x.map(s, xe),
                                l = 0;
                            l < o;
                            l++
                        )
                            (t = s[l]),
                                pe.test(t.type || "") &&
                                    !x._data(t, "globalEval") &&
                                    x.contains(r, t) &&
                                    (t.src
                                        ? x._evalUrl && x._evalUrl(t.src)
                                        : x.globalEval(
                                              (
                                                  t.text ||
                                                  t.textContent ||
                                                  t.innerHTML ||
                                                  ""
                                              ).replace(he, "")
                                          ));
                    a = e = null;
                }
                return this;
            },
        }),
        x.each(
            {
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith",
            },
            function (e, r) {
                x.fn[e] = function (e) {
                    for (
                        var t, n = 0, i = [], o = x(e), s = o.length - 1;
                        n <= s;
                        n++
                    )
                        (t = n === s ? this : this.clone(!0)),
                            x(o[n])[r](t),
                            a.apply(i, t.get());
                    return this.pushStack(i);
                };
            }
        );
    var Se,
        Ce,
        je = {};
    function $e(e, t) {
        var t = x(t.createElement(e)).appendTo(t.body),
            n =
                h.getDefaultComputedStyle &&
                (n = h.getDefaultComputedStyle(t[0]))
                    ? n.display
                    : x.css(t[0], "display");
        return t.detach(), n;
    }
    function _e(e) {
        var t = T,
            n = je[e];
        return (
            n ||
                (("none" !== (n = $e(e, t)) && n) ||
                    ((t = (
                        (Se = (
                            Se ||
                            x("<iframe frameborder='0' width='0' height='0'/>")
                        ).appendTo(t.documentElement))[0].contentWindow ||
                        Se[0].contentDocument
                    ).document).write(),
                    t.close(),
                    (n = $e(e, t)),
                    Se.detach()),
                (je[e] = n)),
            n
        );
    }
    v.shrinkWrapBlocks = function () {
        return null != Ce
            ? Ce
            : ((Ce = !1),
              (t = T.getElementsByTagName("body")[0]) && t.style
                  ? ((e = T.createElement("div")),
                    ((n = T.createElement("div")).style.cssText =
                        "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
                    t.appendChild(n).appendChild(e),
                    typeof e.style.zoom !== P &&
                        ((e.style.cssText =
                            "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1"),
                        (e.appendChild(T.createElement("div")).style.width =
                            "5px"),
                        (Ce = 3 !== e.offsetWidth)),
                    t.removeChild(n),
                    Ce)
                  : void 0);
        var e, t, n;
    };
    var Ae,
        Ee,
        De,
        Ne,
        He,
        Oe,
        Pe = /^margin/,
        Le = new RegExp("^(" + R + ")(?!px)[a-z%]+$", "i"),
        Ie = /^(top|right|bottom|left)$/;
    function Me(t, n) {
        return {
            get: function () {
                var e = t();
                if (null != e)
                    return e
                        ? void delete this.get
                        : (this.get = n).apply(this, arguments);
            },
        };
    }
    function qe() {
        var e,
            t,
            n,
            i = T.getElementsByTagName("body")[0];
        i &&
            i.style &&
            ((e = T.createElement("div")),
            ((t = T.createElement("div")).style.cssText =
                "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
            i.appendChild(t).appendChild(e),
            (e.style.cssText =
                "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute"),
            (De = Ne = !1),
            (Oe = !0),
            h.getComputedStyle &&
                ((De = "1%" !== (h.getComputedStyle(e, null) || {}).top),
                (Ne =
                    "4px" ===
                    (h.getComputedStyle(e, null) || { width: "4px" }).width),
                ((n = e.appendChild(T.createElement("div"))).style.cssText =
                    e.style.cssText =
                        "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0"),
                (n.style.marginRight = n.style.width = "0"),
                (e.style.width = "1px"),
                (Oe = !parseFloat(
                    (h.getComputedStyle(n, null) || {}).marginRight
                )),
                e.removeChild(n)),
            (e.innerHTML = "<table><tr><td></td><td>t</td></tr></table>"),
            ((n = e.getElementsByTagName("td"))[0].style.cssText =
                "margin:0;border:0;padding:0;display:none"),
            (He = 0 === n[0].offsetHeight) &&
                ((n[0].style.display = ""),
                (n[1].style.display = "none"),
                (He = 0 === n[0].offsetHeight)),
            i.removeChild(t));
    }
    h.getComputedStyle
        ? ((Ae = function (e) {
              return (
                  e.ownerDocument.defaultView.opener
                      ? e.ownerDocument.defaultView
                      : h
              ).getComputedStyle(e, null);
          }),
          (Ee = function (e, t, n) {
              var i,
                  o = e.style,
                  s = (n = n || Ae(e)) ? n.getPropertyValue(t) || n[t] : void 0;
              return (
                  n &&
                      ("" !== s ||
                          x.contains(e.ownerDocument, e) ||
                          (s = x.style(e, t)),
                      Le.test(s) &&
                          Pe.test(t) &&
                          ((i = o.width),
                          (e = o.minWidth),
                          (t = o.maxWidth),
                          (o.minWidth = o.maxWidth = o.width = s),
                          (s = n.width),
                          (o.width = i),
                          (o.minWidth = e),
                          (o.maxWidth = t))),
                  void 0 === s ? s : s + ""
              );
          }))
        : T.documentElement.currentStyle &&
          ((Ae = function (e) {
              return e.currentStyle;
          }),
          (Ee = function (e, t, n) {
              var i,
                  o,
                  s,
                  r = e.style;
              return (
                  null == (s = (n = n || Ae(e)) ? n[t] : void 0) &&
                      r &&
                      r[t] &&
                      (s = r[t]),
                  Le.test(s) &&
                      !Ie.test(t) &&
                      ((i = r.left),
                      (n = (o = e.runtimeStyle) && o.left) &&
                          (o.left = e.currentStyle.left),
                      (r.left = "fontSize" === t ? "1em" : s),
                      (s = r.pixelLeft + "px"),
                      (r.left = i),
                      n && (o.left = n)),
                  void 0 === s ? s : s + "" || "auto"
              );
          })),
        ((nt = T.createElement("div")).innerHTML =
            "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
        (it = (it = nt.getElementsByTagName("a")[0]) && it.style) &&
            ((it.cssText = "float:left;opacity:.5"),
            (v.opacity = "0.5" === it.opacity),
            (v.cssFloat = !!it.cssFloat),
            (nt.style.backgroundClip = "content-box"),
            (nt.cloneNode(!0).style.backgroundClip = ""),
            (v.clearCloneStyle = "content-box" === nt.style.backgroundClip),
            (v.boxSizing =
                "" === it.boxSizing ||
                "" === it.MozBoxSizing ||
                "" === it.WebkitBoxSizing),
            x.extend(v, {
                reliableHiddenOffsets: function () {
                    return null == He && qe(), He;
                },
                boxSizingReliable: function () {
                    return null == Ne && qe(), Ne;
                },
                pixelPosition: function () {
                    return null == De && qe(), De;
                },
                reliableMarginRight: function () {
                    return null == Oe && qe(), Oe;
                },
            })),
        (x.swap = function (e, t, n, i) {
            var o,
                s = {};
            for (o in t) (s[o] = e.style[o]), (e.style[o] = t[o]);
            for (o in ((i = n.apply(e, i || [])), t)) e.style[o] = s[o];
            return i;
        });
    var We = /alpha\([^)]*\)/i,
        ze = /opacity\s*=\s*([^)]*)/,
        Fe = /^(none|table(?!-c[ea]).+)/,
        Re = new RegExp("^(" + R + ")(.*)$", "i"),
        Be = new RegExp("^([+-])=(" + R + ")", "i"),
        Ue = { position: "absolute", visibility: "hidden", display: "block" },
        Xe = { letterSpacing: "0", fontWeight: "400" },
        Ve = ["Webkit", "O", "Moz", "ms"];
    function Ye(e, t) {
        if (t in e) return t;
        for (
            var n = t.charAt(0).toUpperCase() + t.slice(1),
                i = t,
                o = Ve.length;
            o--;

        )
            if ((t = Ve[o] + n) in e) return t;
        return i;
    }
    function Je(e, t) {
        for (var n, i, o, s = [], r = 0, a = e.length; r < a; r++)
            (i = e[r]).style &&
                ((s[r] = x._data(i, "olddisplay")),
                (n = i.style.display),
                t
                    ? (s[r] || "none" !== n || (i.style.display = ""),
                      "" === i.style.display &&
                          F(i) &&
                          (s[r] = x._data(i, "olddisplay", _e(i.nodeName))))
                    : ((o = F(i)),
                      ((n && "none" !== n) || !o) &&
                          x._data(
                              i,
                              "olddisplay",
                              o ? n : x.css(i, "display")
                          )));
        for (r = 0; r < a; r++)
            (i = e[r]).style &&
                ((t && "none" !== i.style.display && "" !== i.style.display) ||
                    (i.style.display = t ? s[r] || "" : "none"));
        return e;
    }
    function Ge(e, t, n) {
        var i = Re.exec(t);
        return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t;
    }
    function Qe(e, t, n, i, o) {
        for (
            var s =
                    n === (i ? "border" : "content")
                        ? 4
                        : "width" === t
                        ? 1
                        : 0,
                r = 0;
            s < 4;
            s += 2
        )
            "margin" === n && (r += x.css(e, n + B[s], !0, o)),
                i
                    ? ("content" === n &&
                          (r -= x.css(e, "padding" + B[s], !0, o)),
                      "margin" !== n &&
                          (r -= x.css(e, "border" + B[s] + "Width", !0, o)))
                    : ((r += x.css(e, "padding" + B[s], !0, o)),
                      "padding" !== n &&
                          (r += x.css(e, "border" + B[s] + "Width", !0, o)));
        return r;
    }
    function Ke(e, t, n) {
        var i = !0,
            o = "width" === t ? e.offsetWidth : e.offsetHeight,
            s = Ae(e),
            r = v.boxSizing && "border-box" === x.css(e, "boxSizing", !1, s);
        if (o <= 0 || null == o) {
            if (
                (((o = Ee(e, t, s)) < 0 || null == o) && (o = e.style[t]),
                Le.test(o))
            )
                return o;
            (i = r && (v.boxSizingReliable() || o === e.style[t])),
                (o = parseFloat(o) || 0);
        }
        return o + Qe(e, t, n || (r ? "border" : "content"), i, s) + "px";
    }
    function Ze(e, t, n, i, o) {
        return new Ze.prototype.init(e, t, n, i, o);
    }
    x.extend({
        cssHooks: {
            opacity: {
                get: function (e, t) {
                    if (t) {
                        e = Ee(e, "opacity");
                        return "" === e ? "1" : e;
                    }
                },
            },
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0,
        },
        cssProps: { float: v.cssFloat ? "cssFloat" : "styleFloat" },
        style: function (e, t, n, i) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var o,
                    s,
                    r,
                    a = x.camelCase(t),
                    l = e.style;
                if (
                    ((t = x.cssProps[a] || (x.cssProps[a] = Ye(l, a))),
                    (r = x.cssHooks[t] || x.cssHooks[a]),
                    void 0 === n)
                )
                    return r && "get" in r && void 0 !== (o = r.get(e, !1, i))
                        ? o
                        : l[t];
                if (
                    ("string" === (s = typeof n) &&
                        (o = Be.exec(n)) &&
                        ((n = (o[1] + 1) * o[2] + parseFloat(x.css(e, t))),
                        (s = "number")),
                    null != n &&
                        n == n &&
                        ("number" !== s || x.cssNumber[a] || (n += "px"),
                        v.clearCloneStyle ||
                            "" !== n ||
                            0 !== t.indexOf("background") ||
                            (l[t] = "inherit"),
                        !(r && "set" in r && void 0 === (n = r.set(e, n, i)))))
                )
                    try {
                        l[t] = n;
                    } catch (e) {}
            }
        },
        css: function (e, t, n, i) {
            var o,
                s = x.camelCase(t);
            return (
                (t = x.cssProps[s] || (x.cssProps[s] = Ye(e.style, s))),
                "normal" ===
                    (o =
                        void 0 ===
                        (o =
                            (s = x.cssHooks[t] || x.cssHooks[s]) && "get" in s
                                ? s.get(e, !0, n)
                                : o)
                            ? Ee(e, t, i)
                            : o) &&
                    t in Xe &&
                    (o = Xe[t]),
                "" === n || n
                    ? ((t = parseFloat(o)),
                      !0 === n || x.isNumeric(t) ? t || 0 : o)
                    : o
            );
        },
    }),
        x.each(["height", "width"], function (e, o) {
            x.cssHooks[o] = {
                get: function (e, t, n) {
                    return t
                        ? Fe.test(x.css(e, "display")) && 0 === e.offsetWidth
                            ? x.swap(e, Ue, function () {
                                  return Ke(e, o, n);
                              })
                            : Ke(e, o, n)
                        : void 0;
                },
                set: function (e, t, n) {
                    var i = n && Ae(e);
                    return Ge(
                        0,
                        t,
                        n
                            ? Qe(
                                  e,
                                  o,
                                  n,
                                  v.boxSizing &&
                                      "border-box" ===
                                          x.css(e, "boxSizing", !1, i),
                                  i
                              )
                            : 0
                    );
                },
            };
        }),
        v.opacity ||
            (x.cssHooks.opacity = {
                get: function (e, t) {
                    return ze.test(
                        (t && e.currentStyle ? e.currentStyle : e.style)
                            .filter || ""
                    )
                        ? 0.01 * parseFloat(RegExp.$1) + ""
                        : t
                        ? "1"
                        : "";
                },
                set: function (e, t) {
                    var n = e.style,
                        i = e.currentStyle,
                        o = x.isNumeric(t)
                            ? "alpha(opacity=" + 100 * t + ")"
                            : "",
                        e = (i && i.filter) || n.filter || "";
                    (((n.zoom = 1) <= t || "" === t) &&
                        "" === x.trim(e.replace(We, "")) &&
                        n.removeAttribute &&
                        (n.removeAttribute("filter"),
                        "" === t || (i && !i.filter))) ||
                        (n.filter = We.test(e)
                            ? e.replace(We, o)
                            : e + " " + o);
                },
            }),
        (x.cssHooks.marginRight = Me(v.reliableMarginRight, function (e, t) {
            return t
                ? x.swap(e, { display: "inline-block" }, Ee, [e, "marginRight"])
                : void 0;
        })),
        x.each({ margin: "", padding: "", border: "Width" }, function (o, s) {
            (x.cssHooks[o + s] = {
                expand: function (e) {
                    for (
                        var t = 0,
                            n = {},
                            i = "string" == typeof e ? e.split(" ") : [e];
                        t < 4;
                        t++
                    )
                        n[o + B[t] + s] = i[t] || i[t - 2] || i[0];
                    return n;
                },
            }),
                Pe.test(o) || (x.cssHooks[o + s].set = Ge);
        }),
        x.fn.extend({
            css: function (e, t) {
                return U(
                    this,
                    function (e, t, n) {
                        var i,
                            o,
                            s = {},
                            r = 0;
                        if (x.isArray(t)) {
                            for (i = Ae(e), o = t.length; r < o; r++)
                                s[t[r]] = x.css(e, t[r], !1, i);
                            return s;
                        }
                        return void 0 !== n ? x.style(e, t, n) : x.css(e, t);
                    },
                    e,
                    t,
                    1 < arguments.length
                );
            },
            show: function () {
                return Je(this, !0);
            },
            hide: function () {
                return Je(this);
            },
            toggle: function (e) {
                return "boolean" == typeof e
                    ? e
                        ? this.show()
                        : this.hide()
                    : this.each(function () {
                          F(this) ? x(this).show() : x(this).hide();
                      });
            },
        }),
        ((x.Tween = Ze).prototype = {
            constructor: Ze,
            init: function (e, t, n, i, o, s) {
                (this.elem = e),
                    (this.prop = n),
                    (this.easing = o || "swing"),
                    (this.options = t),
                    (this.start = this.now = this.cur()),
                    (this.end = i),
                    (this.unit = s || (x.cssNumber[n] ? "" : "px"));
            },
            cur: function () {
                var e = Ze.propHooks[this.prop];
                return (e && e.get ? e : Ze.propHooks._default).get(this);
            },
            run: function (e) {
                var t,
                    n = Ze.propHooks[this.prop];
                return (
                    this.options.duration
                        ? (this.pos = t =
                              x.easing[this.easing](
                                  e,
                                  this.options.duration * e,
                                  0,
                                  1,
                                  this.options.duration
                              ))
                        : (this.pos = t = e),
                    (this.now = (this.end - this.start) * t + this.start),
                    this.options.step &&
                        this.options.step.call(this.elem, this.now, this),
                    (n && n.set ? n : Ze.propHooks._default).set(this),
                    this
                );
            },
        }),
        (Ze.prototype.init.prototype = Ze.prototype),
        (Ze.propHooks = {
            _default: {
                get: function (e) {
                    var t;
                    return null == e.elem[e.prop] ||
                        (e.elem.style && null != e.elem.style[e.prop])
                        ? (t = x.css(e.elem, e.prop, "")) && "auto" !== t
                            ? t
                            : 0
                        : e.elem[e.prop];
                },
                set: function (e) {
                    x.fx.step[e.prop]
                        ? x.fx.step[e.prop](e)
                        : e.elem.style &&
                          (null != e.elem.style[x.cssProps[e.prop]] ||
                              x.cssHooks[e.prop])
                        ? x.style(e.elem, e.prop, e.now + e.unit)
                        : (e.elem[e.prop] = e.now);
                },
            },
        }),
        (Ze.propHooks.scrollTop = Ze.propHooks.scrollLeft =
            {
                set: function (e) {
                    e.elem.nodeType &&
                        e.elem.parentNode &&
                        (e.elem[e.prop] = e.now);
                },
            }),
        (x.easing = {
            linear: function (e) {
                return e;
            },
            swing: function (e) {
                return 0.5 - Math.cos(e * Math.PI) / 2;
            },
        }),
        (x.fx = Ze.prototype.init),
        (x.fx.step = {});
    var et,
        tt,
        nt,
        it,
        ot = /^(?:toggle|show|hide)$/,
        st = new RegExp("^(?:([+-])=|)(" + R + ")([a-z%]*)$", "i"),
        rt = /queueHooks$/,
        at = [
            function (t, e, n) {
                var i,
                    o,
                    s,
                    r,
                    a,
                    l,
                    c,
                    d = this,
                    u = {},
                    p = t.style,
                    f = t.nodeType && F(t),
                    h = x._data(t, "fxshow");
                for (i in (n.queue ||
                    (null == (a = x._queueHooks(t, "fx")).unqueued &&
                        ((a.unqueued = 0),
                        (l = a.empty.fire),
                        (a.empty.fire = function () {
                            a.unqueued || l();
                        })),
                    a.unqueued++,
                    d.always(function () {
                        d.always(function () {
                            a.unqueued--,
                                x.queue(t, "fx").length || a.empty.fire();
                        });
                    })),
                1 === t.nodeType &&
                    ("height" in e || "width" in e) &&
                    ((n.overflow = [p.overflow, p.overflowX, p.overflowY]),
                    (c = x.css(t, "display")),
                    "inline" ===
                        ("none" === c
                            ? x._data(t, "olddisplay") || _e(t.nodeName)
                            : c) &&
                        "none" === x.css(t, "float") &&
                        (v.inlineBlockNeedsLayout && "inline" !== _e(t.nodeName)
                            ? (p.zoom = 1)
                            : (p.display = "inline-block"))),
                n.overflow &&
                    ((p.overflow = "hidden"),
                    v.shrinkWrapBlocks() ||
                        d.always(function () {
                            (p.overflow = n.overflow[0]),
                                (p.overflowX = n.overflow[1]),
                                (p.overflowY = n.overflow[2]);
                        })),
                e))
                    if (((o = e[i]), ot.exec(o))) {
                        if (
                            (delete e[i],
                            (s = s || "toggle" === o),
                            o === (f ? "hide" : "show"))
                        ) {
                            if ("show" !== o || !h || void 0 === h[i]) continue;
                            f = !0;
                        }
                        u[i] = (h && h[i]) || x.style(t, i);
                    } else c = void 0;
                if (x.isEmptyObject(u))
                    "inline" === ("none" === c ? _e(t.nodeName) : c) &&
                        (p.display = c);
                else
                    for (i in (h
                        ? "hidden" in h && (f = h.hidden)
                        : (h = x._data(t, "fxshow", {})),
                    s && (h.hidden = !f),
                    f
                        ? x(t).show()
                        : d.done(function () {
                              x(t).hide();
                          }),
                    d.done(function () {
                        for (var e in (x._removeData(t, "fxshow"), u))
                            x.style(t, e, u[e]);
                    }),
                    u))
                        (r = ut(f ? h[i] : 0, i, d)),
                            i in h ||
                                ((h[i] = r.start),
                                f &&
                                    ((r.end = r.start),
                                    (r.start =
                                        "width" === i || "height" === i
                                            ? 1
                                            : 0)));
            },
        ],
        lt = {
            "*": [
                function (e, t) {
                    var n = this.createTween(e, t),
                        i = n.cur(),
                        t = st.exec(t),
                        o = (t && t[3]) || (x.cssNumber[e] ? "" : "px"),
                        s =
                            (x.cssNumber[e] || ("px" !== o && +i)) &&
                            st.exec(x.css(n.elem, e)),
                        r = 1,
                        a = 20;
                    if (s && s[3] !== o)
                        for (
                            o = o || s[3], t = t || [], s = +i || 1;
                            x.style(n.elem, e, (s /= r = r || ".5") + o),
                                r !== (r = n.cur() / i) && 1 !== r && --a;

                        );
                    return (
                        t &&
                            ((s = n.start = +s || +i || 0),
                            (n.unit = o),
                            (n.end = t[1] ? s + (t[1] + 1) * t[2] : +t[2])),
                        n
                    );
                },
            ],
        };
    function ct() {
        return (
            setTimeout(function () {
                et = void 0;
            }),
            (et = x.now())
        );
    }
    function dt(e, t) {
        var n,
            i = { height: e },
            o = 0;
        for (t = t ? 1 : 0; o < 4; o += 2 - t)
            i["margin" + (n = B[o])] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e), i;
    }
    function ut(e, t, n) {
        for (
            var i, o = (lt[t] || []).concat(lt["*"]), s = 0, r = o.length;
            s < r;
            s++
        )
            if ((i = o[s].call(n, t, e))) return i;
    }
    function pt(o, e, t) {
        var n,
            s,
            i = 0,
            r = at.length,
            a = x.Deferred().always(function () {
                delete l.elem;
            }),
            l = function () {
                if (s) return !1;
                for (
                    var e = et || ct(),
                        e = Math.max(0, c.startTime + c.duration - e),
                        t = 1 - (e / c.duration || 0),
                        n = 0,
                        i = c.tweens.length;
                    n < i;
                    n++
                )
                    c.tweens[n].run(t);
                return (
                    a.notifyWith(o, [c, t, e]),
                    t < 1 && i ? e : (a.resolveWith(o, [c]), !1)
                );
            },
            c = a.promise({
                elem: o,
                props: x.extend({}, e),
                opts: x.extend(!0, { specialEasing: {} }, t),
                originalProperties: e,
                originalOptions: t,
                startTime: et || ct(),
                duration: t.duration,
                tweens: [],
                createTween: function (e, t) {
                    e = x.Tween(
                        o,
                        c.opts,
                        e,
                        t,
                        c.opts.specialEasing[e] || c.opts.easing
                    );
                    return c.tweens.push(e), e;
                },
                stop: function (e) {
                    var t = 0,
                        n = e ? c.tweens.length : 0;
                    if (s) return this;
                    for (s = !0; t < n; t++) c.tweens[t].run(1);
                    return (
                        e ? a.resolveWith(o, [c, e]) : a.rejectWith(o, [c, e]),
                        this
                    );
                },
            }),
            d = c.props;
        for (
            (function (e, t) {
                var n, i, o, s, r;
                for (n in e)
                    if (
                        ((i = x.camelCase(n)),
                        (o = t[i]),
                        (s = e[n]),
                        x.isArray(s) && ((o = s[1]), (s = e[n] = s[0])),
                        n !== i && ((e[i] = s), delete e[n]),
                        (r = x.cssHooks[i]),
                        r && ("expand" in r))
                    )
                        for (n in ((s = r.expand(s)), delete e[i], s))
                            (n in e) || ((e[n] = s[n]), (t[n] = o));
                    else t[i] = o;
            })(d, c.opts.specialEasing);
            i < r;
            i++
        )
            if ((n = at[i].call(c, o, d, c.opts))) return n;
        return (
            x.map(d, ut, c),
            x.isFunction(c.opts.start) && c.opts.start.call(o, c),
            x.fx.timer(x.extend(l, { elem: o, anim: c, queue: c.opts.queue })),
            c
                .progress(c.opts.progress)
                .done(c.opts.done, c.opts.complete)
                .fail(c.opts.fail)
                .always(c.opts.always)
        );
    }
    (x.Animation = x.extend(pt, {
        tweener: function (e, t) {
            for (
                var n,
                    i = 0,
                    o = (e = x.isFunction(e) ? ((t = e), ["*"]) : e.split(" "))
                        .length;
                i < o;
                i++
            )
                (n = e[i]), (lt[n] = lt[n] || []), lt[n].unshift(t);
        },
        prefilter: function (e, t) {
            t ? at.unshift(e) : at.push(e);
        },
    })),
        (x.speed = function (e, t, n) {
            var i =
                e && "object" == typeof e
                    ? x.extend({}, e)
                    : {
                          complete: n || (!n && t) || (x.isFunction(e) && e),
                          duration: e,
                          easing: (n && t) || (t && !x.isFunction(t) && t),
                      };
            return (
                (i.duration = x.fx.off
                    ? 0
                    : "number" == typeof i.duration
                    ? i.duration
                    : i.duration in x.fx.speeds
                    ? x.fx.speeds[i.duration]
                    : x.fx.speeds._default),
                (null != i.queue && !0 !== i.queue) || (i.queue = "fx"),
                (i.old = i.complete),
                (i.complete = function () {
                    x.isFunction(i.old) && i.old.call(this),
                        i.queue && x.dequeue(this, i.queue);
                }),
                i
            );
        }),
        x.fn.extend({
            fadeTo: function (e, t, n, i) {
                return this.filter(F)
                    .css("opacity", 0)
                    .show()
                    .end()
                    .animate({ opacity: t }, e, n, i);
            },
            animate: function (t, e, n, i) {
                var o = x.isEmptyObject(t),
                    s = x.speed(e, n, i),
                    i = function () {
                        var e = pt(this, x.extend({}, t), s);
                        (o || x._data(this, "finish")) && e.stop(!0);
                    };
                return (
                    (i.finish = i),
                    o || !1 === s.queue ? this.each(i) : this.queue(s.queue, i)
                );
            },
            stop: function (o, e, s) {
                function r(e) {
                    var t = e.stop;
                    delete e.stop, t(s);
                }
                return (
                    "string" != typeof o && ((s = e), (e = o), (o = void 0)),
                    e && !1 !== o && this.queue(o || "fx", []),
                    this.each(function () {
                        var e = !0,
                            t = null != o && o + "queueHooks",
                            n = x.timers,
                            i = x._data(this);
                        if (t) i[t] && i[t].stop && r(i[t]);
                        else
                            for (t in i)
                                i[t] && i[t].stop && rt.test(t) && r(i[t]);
                        for (t = n.length; t--; )
                            n[t].elem !== this ||
                                (null != o && n[t].queue !== o) ||
                                (n[t].anim.stop(s), (e = !1), n.splice(t, 1));
                        (!e && s) || x.dequeue(this, o);
                    })
                );
            },
            finish: function (r) {
                return (
                    !1 !== r && (r = r || "fx"),
                    this.each(function () {
                        var e,
                            t = x._data(this),
                            n = t[r + "queue"],
                            i = t[r + "queueHooks"],
                            o = x.timers,
                            s = n ? n.length : 0;
                        for (
                            t.finish = !0,
                                x.queue(this, r, []),
                                i && i.stop && i.stop.call(this, !0),
                                e = o.length;
                            e--;

                        )
                            o[e].elem === this &&
                                o[e].queue === r &&
                                (o[e].anim.stop(!0), o.splice(e, 1));
                        for (e = 0; e < s; e++)
                            n[e] && n[e].finish && n[e].finish.call(this);
                        delete t.finish;
                    })
                );
            },
        }),
        x.each(["toggle", "show", "hide"], function (e, i) {
            var o = x.fn[i];
            x.fn[i] = function (e, t, n) {
                return null == e || "boolean" == typeof e
                    ? o.apply(this, arguments)
                    : this.animate(dt(i, !0), e, t, n);
            };
        }),
        x.each(
            {
                slideDown: dt("show"),
                slideUp: dt("hide"),
                slideToggle: dt("toggle"),
                fadeIn: { opacity: "show" },
                fadeOut: { opacity: "hide" },
                fadeToggle: { opacity: "toggle" },
            },
            function (e, i) {
                x.fn[e] = function (e, t, n) {
                    return this.animate(i, e, t, n);
                };
            }
        ),
        (x.timers = []),
        (x.fx.tick = function () {
            var e,
                t = x.timers,
                n = 0;
            for (et = x.now(); n < t.length; n++)
                (e = t[n])() || t[n] !== e || t.splice(n--, 1);
            t.length || x.fx.stop(), (et = void 0);
        }),
        (x.fx.timer = function (e) {
            x.timers.push(e), e() ? x.fx.start() : x.timers.pop();
        }),
        (x.fx.interval = 13),
        (x.fx.start = function () {
            tt = tt || setInterval(x.fx.tick, x.fx.interval);
        }),
        (x.fx.stop = function () {
            clearInterval(tt), (tt = null);
        }),
        (x.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
        (x.fn.delay = function (i, e) {
            return (
                (i = (x.fx && x.fx.speeds[i]) || i),
                this.queue((e = e || "fx"), function (e, t) {
                    var n = setTimeout(e, i);
                    t.stop = function () {
                        clearTimeout(n);
                    };
                })
            );
        }),
        (s = T.createElement("div")).setAttribute("className", "t"),
        (s.innerHTML =
            "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
        (f = s.getElementsByTagName("a")[0]),
        (it = (nt = T.createElement("select")).appendChild(
            T.createElement("option")
        )),
        (R = s.getElementsByTagName("input")[0]),
        (f.style.cssText = "top:1px"),
        (v.getSetAttribute = "t" !== s.className),
        (v.style = /top/.test(f.getAttribute("style"))),
        (v.hrefNormalized = "/a" === f.getAttribute("href")),
        (v.checkOn = !!R.value),
        (v.optSelected = it.selected),
        (v.enctype = !!T.createElement("form").enctype),
        (nt.disabled = !0),
        (v.optDisabled = !it.disabled),
        (R = T.createElement("input")).setAttribute("value", ""),
        (v.input = "" === R.getAttribute("value")),
        (R.value = "t"),
        R.setAttribute("type", "radio"),
        (v.radioValue = "t" === R.value);
    var ft = /\r/g;
    x.fn.extend({
        val: function (t) {
            var n,
                e,
                i,
                o = this[0];
            return arguments.length
                ? ((i = x.isFunction(t)),
                  this.each(function (e) {
                      1 === this.nodeType &&
                          (null == (e = i ? t.call(this, e, x(this).val()) : t)
                              ? (e = "")
                              : "number" == typeof e
                              ? (e += "")
                              : x.isArray(e) &&
                                (e = x.map(e, function (e) {
                                    return null == e ? "" : e + "";
                                })),
                          ((n =
                              x.valHooks[this.type] ||
                              x.valHooks[this.nodeName.toLowerCase()]) &&
                              "set" in n &&
                              void 0 !== n.set(this, e, "value")) ||
                              (this.value = e));
                  }))
                : o
                ? (n =
                      x.valHooks[o.type] ||
                      x.valHooks[o.nodeName.toLowerCase()]) &&
                  "get" in n &&
                  void 0 !== (e = n.get(o, "value"))
                    ? e
                    : "string" == typeof (e = o.value)
                    ? e.replace(ft, "")
                    : null == e
                    ? ""
                    : e
                : void 0;
        },
    }),
        x.extend({
            valHooks: {
                option: {
                    get: function (e) {
                        var t = x.find.attr(e, "value");
                        return null != t ? t : x.trim(x.text(e));
                    },
                },
                select: {
                    get: function (e) {
                        for (
                            var t,
                                n = e.options,
                                i = e.selectedIndex,
                                o = "select-one" === e.type || i < 0,
                                s = o ? null : [],
                                r = o ? i + 1 : n.length,
                                a = i < 0 ? r : o ? i : 0;
                            a < r;
                            a++
                        )
                            if (
                                !(
                                    (!(t = n[a]).selected && a !== i) ||
                                    (v.optDisabled
                                        ? t.disabled
                                        : null !==
                                          t.getAttribute("disabled")) ||
                                    (t.parentNode.disabled &&
                                        x.nodeName(t.parentNode, "optgroup"))
                                )
                            ) {
                                if (((t = x(t).val()), o)) return t;
                                s.push(t);
                            }
                        return s;
                    },
                    set: function (e, t) {
                        for (
                            var n,
                                i,
                                o = e.options,
                                s = x.makeArray(t),
                                r = o.length;
                            r--;

                        )
                            if (
                                ((i = o[r]),
                                0 <= x.inArray(x.valHooks.option.get(i), s))
                            )
                                try {
                                    i.selected = n = !0;
                                } catch (e) {
                                    i.scrollHeight;
                                }
                            else i.selected = !1;
                        return n || (e.selectedIndex = -1), o;
                    },
                },
            },
        }),
        x.each(["radio", "checkbox"], function () {
            (x.valHooks[this] = {
                set: function (e, t) {
                    return x.isArray(t)
                        ? (e.checked = 0 <= x.inArray(x(e).val(), t))
                        : void 0;
                },
            }),
                v.checkOn ||
                    (x.valHooks[this].get = function (e) {
                        return null === e.getAttribute("value")
                            ? "on"
                            : e.value;
                    });
        });
    var ht,
        mt,
        gt = x.expr.attrHandle,
        vt = /^(?:checked|selected)$/i,
        yt = v.getSetAttribute,
        bt = v.input;
    x.fn.extend({
        attr: function (e, t) {
            return U(this, x.attr, e, t, 1 < arguments.length);
        },
        removeAttr: function (e) {
            return this.each(function () {
                x.removeAttr(this, e);
            });
        },
    }),
        x.extend({
            attr: function (e, t, n) {
                var i,
                    o,
                    s = e.nodeType;
                if (e && 3 !== s && 8 !== s && 2 !== s)
                    return typeof e.getAttribute === P
                        ? x.prop(e, t, n)
                        : ((1 === s && x.isXMLDoc(e)) ||
                              ((t = t.toLowerCase()),
                              (i =
                                  x.attrHooks[t] ||
                                  (x.expr.match.bool.test(t) ? mt : ht))),
                          void 0 === n
                              ? i && "get" in i && null !== (o = i.get(e, t))
                                  ? o
                                  : null == (o = x.find.attr(e, t))
                                  ? void 0
                                  : o
                              : null !== n
                              ? i &&
                                "set" in i &&
                                void 0 !== (o = i.set(e, n, t))
                                  ? o
                                  : (e.setAttribute(t, n + ""), n)
                              : void x.removeAttr(e, t));
            },
            removeAttr: function (e, t) {
                var n,
                    i,
                    o = 0,
                    s = t && t.match(E);
                if (s && 1 === e.nodeType)
                    for (; (n = s[o++]); )
                        (i = x.propFix[n] || n),
                            x.expr.match.bool.test(n)
                                ? (bt && yt) || !vt.test(n)
                                    ? (e[i] = !1)
                                    : (e[x.camelCase("default-" + n)] = e[i] =
                                          !1)
                                : x.attr(e, n, ""),
                            e.removeAttribute(yt ? n : i);
            },
            attrHooks: {
                type: {
                    set: function (e, t) {
                        if (
                            !v.radioValue &&
                            "radio" === t &&
                            x.nodeName(e, "input")
                        ) {
                            var n = e.value;
                            return (
                                e.setAttribute("type", t), n && (e.value = n), t
                            );
                        }
                    },
                },
            },
        }),
        (mt = {
            set: function (e, t, n) {
                return (
                    !1 === t
                        ? x.removeAttr(e, n)
                        : (bt && yt) || !vt.test(n)
                        ? e.setAttribute((!yt && x.propFix[n]) || n, n)
                        : (e[x.camelCase("default-" + n)] = e[n] = !0),
                    n
                );
            },
        }),
        x.each(x.expr.match.bool.source.match(/\w+/g), function (e, t) {
            var s = gt[t] || x.find.attr;
            gt[t] =
                (bt && yt) || !vt.test(t)
                    ? function (e, t, n) {
                          var i, o;
                          return (
                              n ||
                                  ((o = gt[t]),
                                  (gt[t] = i),
                                  (i =
                                      null != s(e, t, n)
                                          ? t.toLowerCase()
                                          : null),
                                  (gt[t] = o)),
                              i
                          );
                      }
                    : function (e, t, n) {
                          return n
                              ? void 0
                              : e[x.camelCase("default-" + t)]
                              ? t.toLowerCase()
                              : null;
                      };
        }),
        (bt && yt) ||
            (x.attrHooks.value = {
                set: function (e, t, n) {
                    return x.nodeName(e, "input")
                        ? void (e.defaultValue = t)
                        : ht && ht.set(e, t, n);
                },
            }),
        yt ||
            ((ht = {
                set: function (e, t, n) {
                    var i = e.getAttributeNode(n);
                    return (
                        i ||
                            e.setAttributeNode(
                                (i = e.ownerDocument.createAttribute(n))
                            ),
                        (i.value = t += ""),
                        "value" === n || t === e.getAttribute(n) ? t : void 0
                    );
                },
            }),
            (gt.id =
                gt.name =
                gt.coords =
                    function (e, t, n) {
                        return n
                            ? void 0
                            : (t = e.getAttributeNode(t)) && "" !== t.value
                            ? t.value
                            : null;
                    }),
            (x.valHooks.button = {
                get: function (e, t) {
                    t = e.getAttributeNode(t);
                    return t && t.specified ? t.value : void 0;
                },
                set: ht.set,
            }),
            (x.attrHooks.contenteditable = {
                set: function (e, t, n) {
                    ht.set(e, "" !== t && t, n);
                },
            }),
            x.each(["width", "height"], function (e, n) {
                x.attrHooks[n] = {
                    set: function (e, t) {
                        return "" === t
                            ? (e.setAttribute(n, "auto"), t)
                            : void 0;
                    },
                };
            })),
        v.style ||
            (x.attrHooks.style = {
                get: function (e) {
                    return e.style.cssText || void 0;
                },
                set: function (e, t) {
                    return (e.style.cssText = t + "");
                },
            });
    var wt = /^(?:input|select|textarea|button|object)$/i,
        xt = /^(?:a|area)$/i;
    x.fn.extend({
        prop: function (e, t) {
            return U(this, x.prop, e, t, 1 < arguments.length);
        },
        removeProp: function (e) {
            return (
                (e = x.propFix[e] || e),
                this.each(function () {
                    try {
                        (this[e] = void 0), delete this[e];
                    } catch (e) {}
                })
            );
        },
    }),
        x.extend({
            propFix: { for: "htmlFor", class: "className" },
            prop: function (e, t, n) {
                var i,
                    o,
                    s = e.nodeType;
                if (e && 3 !== s && 8 !== s && 2 !== s)
                    return (
                        (1 !== s || !x.isXMLDoc(e)) &&
                            ((t = x.propFix[t] || t), (o = x.propHooks[t])),
                        void 0 !== n
                            ? o && "set" in o && void 0 !== (i = o.set(e, n, t))
                                ? i
                                : (e[t] = n)
                            : o && "get" in o && null !== (i = o.get(e, t))
                            ? i
                            : e[t]
                    );
            },
            propHooks: {
                tabIndex: {
                    get: function (e) {
                        var t = x.find.attr(e, "tabindex");
                        return t
                            ? parseInt(t, 10)
                            : wt.test(e.nodeName) ||
                              (xt.test(e.nodeName) && e.href)
                            ? 0
                            : -1;
                    },
                },
            },
        }),
        v.hrefNormalized ||
            x.each(["href", "src"], function (e, t) {
                x.propHooks[t] = {
                    get: function (e) {
                        return e.getAttribute(t, 4);
                    },
                };
            }),
        v.optSelected ||
            (x.propHooks.selected = {
                get: function (e) {
                    e = e.parentNode;
                    return (
                        e &&
                            (e.selectedIndex,
                            e.parentNode && e.parentNode.selectedIndex),
                        null
                    );
                },
            }),
        x.each(
            [
                "tabIndex",
                "readOnly",
                "maxLength",
                "cellSpacing",
                "cellPadding",
                "rowSpan",
                "colSpan",
                "useMap",
                "frameBorder",
                "contentEditable",
            ],
            function () {
                x.propFix[this.toLowerCase()] = this;
            }
        ),
        v.enctype || (x.propFix.enctype = "encoding");
    var kt = /[\t\r\n\f]/g;
    x.fn.extend({
        addClass: function (t) {
            var e,
                n,
                i,
                o,
                s,
                r,
                a = 0,
                l = this.length,
                c = "string" == typeof t && t;
            if (x.isFunction(t))
                return this.each(function (e) {
                    x(this).addClass(t.call(this, e, this.className));
                });
            if (c)
                for (e = (t || "").match(E) || []; a < l; a++)
                    if (
                        (i =
                            1 === (n = this[a]).nodeType &&
                            (n.className
                                ? (" " + n.className + " ").replace(kt, " ")
                                : " "))
                    ) {
                        for (s = 0; (o = e[s++]); )
                            i.indexOf(" " + o + " ") < 0 && (i += o + " ");
                        (r = x.trim(i)), n.className !== r && (n.className = r);
                    }
            return this;
        },
        removeClass: function (t) {
            var e,
                n,
                i,
                o,
                s,
                r,
                a = 0,
                l = this.length,
                c = 0 === arguments.length || ("string" == typeof t && t);
            if (x.isFunction(t))
                return this.each(function (e) {
                    x(this).removeClass(t.call(this, e, this.className));
                });
            if (c)
                for (e = (t || "").match(E) || []; a < l; a++)
                    if (
                        (i =
                            1 === (n = this[a]).nodeType &&
                            (n.className
                                ? (" " + n.className + " ").replace(kt, " ")
                                : ""))
                    ) {
                        for (s = 0; (o = e[s++]); )
                            for (; 0 <= i.indexOf(" " + o + " "); )
                                i = i.replace(" " + o + " ", " ");
                        (r = t ? x.trim(i) : ""),
                            n.className !== r && (n.className = r);
                    }
            return this;
        },
        toggleClass: function (o, t) {
            var s = typeof o;
            return "boolean" == typeof t && "string" == s
                ? t
                    ? this.addClass(o)
                    : this.removeClass(o)
                : this.each(
                      x.isFunction(o)
                          ? function (e) {
                                x(this).toggleClass(
                                    o.call(this, e, this.className, t),
                                    t
                                );
                            }
                          : function () {
                                if ("string" == s)
                                    for (
                                        var e,
                                            t = 0,
                                            n = x(this),
                                            i = o.match(E) || [];
                                        (e = i[t++]);

                                    )
                                        n.hasClass(e)
                                            ? n.removeClass(e)
                                            : n.addClass(e);
                                else
                                    (s !== P && "boolean" != s) ||
                                        (this.className &&
                                            x._data(
                                                this,
                                                "__className__",
                                                this.className
                                            ),
                                        (this.className =
                                            (!this.className &&
                                                !1 !== o &&
                                                x._data(
                                                    this,
                                                    "__className__"
                                                )) ||
                                            ""));
                            }
                  );
        },
        hasClass: function (e) {
            for (var t = " " + e + " ", n = 0, i = this.length; n < i; n++)
                if (
                    1 === this[n].nodeType &&
                    0 <=
                        (" " + this[n].className + " ")
                            .replace(kt, " ")
                            .indexOf(t)
                )
                    return !0;
            return !1;
        },
    }),
        x.each(
            "blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(
                " "
            ),
            function (e, n) {
                x.fn[n] = function (e, t) {
                    return 0 < arguments.length
                        ? this.on(n, null, e, t)
                        : this.trigger(n);
                };
            }
        ),
        x.fn.extend({
            hover: function (e, t) {
                return this.mouseenter(e).mouseleave(t || e);
            },
            bind: function (e, t, n) {
                return this.on(e, null, t, n);
            },
            unbind: function (e, t) {
                return this.off(e, null, t);
            },
            delegate: function (e, t, n, i) {
                return this.on(t, e, n, i);
            },
            undelegate: function (e, t, n) {
                return 1 === arguments.length
                    ? this.off(e, "**")
                    : this.off(t, e || "**", n);
            },
        });
    var Tt = x.now(),
        St = /\?/,
        Ct =
            /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    (x.parseJSON = function (e) {
        if (h.JSON && h.JSON.parse) return h.JSON.parse(e + "");
        var o,
            s = null,
            t = x.trim(e + "");
        return t &&
            !x.trim(
                t.replace(Ct, function (e, t, n, i) {
                    return 0 === (s = o && t ? 0 : s)
                        ? e
                        : ((o = n || t), (s += !i - !n), "");
                })
            )
            ? Function("return " + t)()
            : x.error("Invalid JSON: " + e);
    }),
        (x.parseXML = function (e) {
            var t;
            if (!e || "string" != typeof e) return null;
            try {
                h.DOMParser
                    ? (t = new DOMParser().parseFromString(e, "text/xml"))
                    : (((t = new ActiveXObject("Microsoft.XMLDOM")).async =
                          "false"),
                      t.loadXML(e));
            } catch (e) {
                t = void 0;
            }
            return (
                (t &&
                    t.documentElement &&
                    !t.getElementsByTagName("parsererror").length) ||
                    x.error("Invalid XML: " + e),
                t
            );
        });
    var jt,
        $t,
        _t = /#.*$/,
        At = /([?&])_=[^&]*/,
        Et = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
        Dt = /^(?:GET|HEAD)$/,
        Nt = /^\/\//,
        Ht = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
        Ot = {},
        Pt = {},
        Lt = "*/".concat("*");
    try {
        $t = location.href;
    } catch (e) {
        (($t = T.createElement("a")).href = ""), ($t = $t.href);
    }
    function It(s) {
        return function (e, t) {
            "string" != typeof e && ((t = e), (e = "*"));
            var n,
                i = 0,
                o = e.toLowerCase().match(E) || [];
            if (x.isFunction(t))
                for (; (n = o[i++]); )
                    "+" === n.charAt(0)
                        ? ((n = n.slice(1) || "*"),
                          (s[n] = s[n] || []).unshift(t))
                        : (s[n] = s[n] || []).push(t);
        };
    }
    function Mt(t, i, o, s) {
        var r = {},
            a = t === Pt;
        function l(e) {
            var n;
            return (
                (r[e] = !0),
                x.each(t[e] || [], function (e, t) {
                    t = t(i, o, s);
                    return "string" != typeof t || a || r[t]
                        ? a
                            ? !(n = t)
                            : void 0
                        : (i.dataTypes.unshift(t), l(t), !1);
                }),
                n
            );
        }
        return l(i.dataTypes[0]) || (!r["*"] && l("*"));
    }
    function qt(e, t) {
        var n,
            i,
            o = x.ajaxSettings.flatOptions || {};
        for (i in t) void 0 !== t[i] && ((o[i] ? e : (n = n || {}))[i] = t[i]);
        return n && x.extend(!0, e, n), e;
    }
    (jt = Ht.exec($t.toLowerCase()) || []),
        x.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: $t,
                type: "GET",
                isLocal:
                    /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(
                        jt[1]
                    ),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": Lt,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript",
                },
                contents: { xml: /xml/, html: /html/, json: /json/ },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON",
                },
                converters: {
                    "* text": String,
                    "text html": !0,
                    "text json": x.parseJSON,
                    "text xml": x.parseXML,
                },
                flatOptions: { url: !0, context: !0 },
            },
            ajaxSetup: function (e, t) {
                return t ? qt(qt(e, x.ajaxSettings), t) : qt(x.ajaxSettings, e);
            },
            ajaxPrefilter: It(Ot),
            ajaxTransport: It(Pt),
            ajax: function (e, t) {
                "object" == typeof e && ((t = e), (e = void 0));
                var n,
                    l,
                    c,
                    d,
                    u,
                    p,
                    i,
                    f = x.ajaxSetup({}, (t = t || {})),
                    h = f.context || f,
                    m = f.context && (h.nodeType || h.jquery) ? x(h) : x.event,
                    g = x.Deferred(),
                    v = x.Callbacks("once memory"),
                    y = f.statusCode || {},
                    o = {},
                    s = {},
                    b = 0,
                    r = "canceled",
                    w = {
                        readyState: 0,
                        getResponseHeader: function (e) {
                            var t;
                            if (2 === b) {
                                if (!i)
                                    for (i = {}; (t = Et.exec(c)); )
                                        i[t[1].toLowerCase()] = t[2];
                                t = i[e.toLowerCase()];
                            }
                            return null == t ? null : t;
                        },
                        getAllResponseHeaders: function () {
                            return 2 === b ? c : null;
                        },
                        setRequestHeader: function (e, t) {
                            var n = e.toLowerCase();
                            return (
                                b || ((e = s[n] = s[n] || e), (o[e] = t)), this
                            );
                        },
                        overrideMimeType: function (e) {
                            return b || (f.mimeType = e), this;
                        },
                        statusCode: function (e) {
                            if (e)
                                if (b < 2) for (var t in e) y[t] = [y[t], e[t]];
                                else w.always(e[w.status]);
                            return this;
                        },
                        abort: function (e) {
                            e = e || r;
                            return p && p.abort(e), a(0, e), this;
                        },
                    };
                if (
                    ((g.promise(w).complete = v.add),
                    (w.success = w.done),
                    (w.error = w.fail),
                    (f.url = ((e || f.url || $t) + "")
                        .replace(_t, "")
                        .replace(Nt, jt[1] + "//")),
                    (f.type = t.method || t.type || f.method || f.type),
                    (f.dataTypes = x
                        .trim(f.dataType || "*")
                        .toLowerCase()
                        .match(E) || [""]),
                    null == f.crossDomain &&
                        ((e = Ht.exec(f.url.toLowerCase())),
                        (f.crossDomain = !(
                            !e ||
                            (e[1] === jt[1] &&
                                e[2] === jt[2] &&
                                (e[3] || ("http:" === e[1] ? "80" : "443")) ===
                                    (jt[3] ||
                                        ("http:" === jt[1] ? "80" : "443")))
                        ))),
                    f.data &&
                        f.processData &&
                        "string" != typeof f.data &&
                        (f.data = x.param(f.data, f.traditional)),
                    Mt(Ot, f, t, w),
                    2 === b)
                )
                    return w;
                for (n in ((u = x.event && f.global) &&
                    0 == x.active++ &&
                    x.event.trigger("ajaxStart"),
                (f.type = f.type.toUpperCase()),
                (f.hasContent = !Dt.test(f.type)),
                (l = f.url),
                f.hasContent ||
                    (f.data &&
                        ((l = f.url += (St.test(l) ? "&" : "?") + f.data),
                        delete f.data),
                    !1 === f.cache &&
                        (f.url = At.test(l)
                            ? l.replace(At, "$1_=" + Tt++)
                            : l + (St.test(l) ? "&" : "?") + "_=" + Tt++)),
                f.ifModified &&
                    (x.lastModified[l] &&
                        w.setRequestHeader(
                            "If-Modified-Since",
                            x.lastModified[l]
                        ),
                    x.etag[l] &&
                        w.setRequestHeader("If-None-Match", x.etag[l])),
                ((f.data && f.hasContent && !1 !== f.contentType) ||
                    t.contentType) &&
                    w.setRequestHeader("Content-Type", f.contentType),
                w.setRequestHeader(
                    "Accept",
                    f.dataTypes[0] && f.accepts[f.dataTypes[0]]
                        ? f.accepts[f.dataTypes[0]] +
                              ("*" !== f.dataTypes[0]
                                  ? ", " + Lt + "; q=0.01"
                                  : "")
                        : f.accepts["*"]
                ),
                f.headers))
                    w.setRequestHeader(n, f.headers[n]);
                if (
                    f.beforeSend &&
                    (!1 === f.beforeSend.call(h, w, f) || 2 === b)
                )
                    return w.abort();
                for (n in ((r = "abort"),
                { success: 1, error: 1, complete: 1 }))
                    w[n](f[n]);
                if ((p = Mt(Pt, f, t, w))) {
                    (w.readyState = 1),
                        u && m.trigger("ajaxSend", [w, f]),
                        f.async &&
                            0 < f.timeout &&
                            (d = setTimeout(function () {
                                w.abort("timeout");
                            }, f.timeout));
                    try {
                        (b = 1), p.send(o, a);
                    } catch (e) {
                        if (!(b < 2)) throw e;
                        a(-1, e);
                    }
                } else a(-1, "No Transport");
                function a(e, t, n, i) {
                    var o,
                        s,
                        r,
                        a = t;
                    2 !== b &&
                        ((b = 2),
                        d && clearTimeout(d),
                        (p = void 0),
                        (c = i || ""),
                        (w.readyState = 0 < e ? 4 : 0),
                        (i = (200 <= e && e < 300) || 304 === e),
                        n &&
                            (r = (function (e, t, n) {
                                for (
                                    var i,
                                        o,
                                        s,
                                        r,
                                        a = e.contents,
                                        l = e.dataTypes;
                                    "*" === l[0];

                                )
                                    l.shift(),
                                        void 0 === o &&
                                            (o =
                                                e.mimeType ||
                                                t.getResponseHeader(
                                                    "Content-Type"
                                                ));
                                if (o)
                                    for (r in a)
                                        if (a[r] && a[r].test(o)) {
                                            l.unshift(r);
                                            break;
                                        }
                                if (l[0] in n) s = l[0];
                                else {
                                    for (r in n) {
                                        if (
                                            !l[0] ||
                                            e.converters[r + " " + l[0]]
                                        ) {
                                            s = r;
                                            break;
                                        }
                                        i = i || r;
                                    }
                                    s = s || i;
                                }
                                return s
                                    ? (s !== l[0] && l.unshift(s), n[s])
                                    : void 0;
                            })(f, w, n)),
                        (r = (function (e, t, n, i) {
                            var o,
                                s,
                                r,
                                a,
                                l,
                                c = {},
                                d = e.dataTypes.slice();
                            if (d[1])
                                for (r in e.converters)
                                    c[r.toLowerCase()] = e.converters[r];
                            for (s = d.shift(); s; )
                                if (
                                    (e.responseFields[s] &&
                                        (n[e.responseFields[s]] = t),
                                    !l &&
                                        i &&
                                        e.dataFilter &&
                                        (t = e.dataFilter(t, e.dataType)),
                                    (l = s),
                                    (s = d.shift()))
                                )
                                    if ("*" === s) s = l;
                                    else if ("*" !== l && l !== s) {
                                        if (
                                            !(r = c[l + " " + s] || c["* " + s])
                                        )
                                            for (o in c)
                                                if (
                                                    ((a = o.split(" ")),
                                                    a[1] === s &&
                                                        (r =
                                                            c[l + " " + a[0]] ||
                                                            c["* " + a[0]]))
                                                ) {
                                                    !0 === r
                                                        ? (r = c[o])
                                                        : !0 !== c[o] &&
                                                          ((s = a[0]),
                                                          d.unshift(a[1]));
                                                    break;
                                                }
                                        if (!0 !== r)
                                            if (r && e.throws) t = r(t);
                                            else
                                                try {
                                                    t = r(t);
                                                } catch (e) {
                                                    return {
                                                        state: "parsererror",
                                                        error: r
                                                            ? e
                                                            : "No conversion from " +
                                                              l +
                                                              " to " +
                                                              s,
                                                    };
                                                }
                                    }
                            return { state: "success", data: t };
                        })(f, r, w, i)),
                        i
                            ? (f.ifModified &&
                                  ((n = w.getResponseHeader("Last-Modified")) &&
                                      (x.lastModified[l] = n),
                                  (n = w.getResponseHeader("etag")) &&
                                      (x.etag[l] = n)),
                              204 === e || "HEAD" === f.type
                                  ? (a = "nocontent")
                                  : 304 === e
                                  ? (a = "notmodified")
                                  : ((a = r.state),
                                    (o = r.data),
                                    (i = !(s = r.error))))
                            : ((s = a),
                              (!e && a) || ((a = "error"), e < 0 && (e = 0))),
                        (w.status = e),
                        (w.statusText = (t || a) + ""),
                        i
                            ? g.resolveWith(h, [o, a, w])
                            : g.rejectWith(h, [w, a, s]),
                        w.statusCode(y),
                        (y = void 0),
                        u &&
                            m.trigger(i ? "ajaxSuccess" : "ajaxError", [
                                w,
                                f,
                                i ? o : s,
                            ]),
                        v.fireWith(h, [w, a]),
                        u &&
                            (m.trigger("ajaxComplete", [w, f]),
                            --x.active || x.event.trigger("ajaxStop")));
                }
                return w;
            },
            getJSON: function (e, t, n) {
                return x.get(e, t, n, "json");
            },
            getScript: function (e, t) {
                return x.get(e, void 0, t, "script");
            },
        }),
        x.each(["get", "post"], function (e, o) {
            x[o] = function (e, t, n, i) {
                return (
                    x.isFunction(t) && ((i = i || n), (n = t), (t = void 0)),
                    x.ajax({
                        url: e,
                        type: o,
                        dataType: i,
                        data: t,
                        success: n,
                    })
                );
            };
        }),
        (x._evalUrl = function (e) {
            return x.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                async: !1,
                global: !1,
                throws: !0,
            });
        }),
        x.fn.extend({
            wrapAll: function (t) {
                return x.isFunction(t)
                    ? this.each(function (e) {
                          x(this).wrapAll(t.call(this, e));
                      })
                    : (this[0] &&
                          ((e = x(t, this[0].ownerDocument).eq(0).clone(!0)),
                          this[0].parentNode && e.insertBefore(this[0]),
                          e
                              .map(function () {
                                  for (
                                      var e = this;
                                      e.firstChild &&
                                      1 === e.firstChild.nodeType;

                                  )
                                      e = e.firstChild;
                                  return e;
                              })
                              .append(this)),
                      this);
                var e;
            },
            wrapInner: function (n) {
                return this.each(
                    x.isFunction(n)
                        ? function (e) {
                              x(this).wrapInner(n.call(this, e));
                          }
                        : function () {
                              var e = x(this),
                                  t = e.contents();
                              t.length ? t.wrapAll(n) : e.append(n);
                          }
                );
            },
            wrap: function (t) {
                var n = x.isFunction(t);
                return this.each(function (e) {
                    x(this).wrapAll(n ? t.call(this, e) : t);
                });
            },
            unwrap: function () {
                return this.parent()
                    .each(function () {
                        x.nodeName(this, "body") ||
                            x(this).replaceWith(this.childNodes);
                    })
                    .end();
            },
        }),
        (x.expr.filters.hidden = function (e) {
            return (
                (e.offsetWidth <= 0 && e.offsetHeight <= 0) ||
                (!v.reliableHiddenOffsets() &&
                    "none" ===
                        ((e.style && e.style.display) || x.css(e, "display")))
            );
        }),
        (x.expr.filters.visible = function (e) {
            return !x.expr.filters.hidden(e);
        });
    var Wt = /%20/g,
        zt = /\[\]$/,
        Ft = /\r?\n/g,
        Rt = /^(?:submit|button|image|reset|file)$/i,
        Bt = /^(?:input|select|textarea|keygen)/i;
    (x.param = function (e, t) {
        function n(e, t) {
            (t = x.isFunction(t) ? t() : null == t ? "" : t),
                (o[o.length] =
                    encodeURIComponent(e) + "=" + encodeURIComponent(t));
        }
        var i,
            o = [];
        if (
            (void 0 === t && (t = x.ajaxSettings && x.ajaxSettings.traditional),
            x.isArray(e) || (e.jquery && !x.isPlainObject(e)))
        )
            x.each(e, function () {
                n(this.name, this.value);
            });
        else
            for (i in e)
                !(function n(i, e, o, s) {
                    if (x.isArray(e))
                        x.each(e, function (e, t) {
                            o || zt.test(i)
                                ? s(i, t)
                                : n(
                                      i +
                                          "[" +
                                          ("object" == typeof t ? e : "") +
                                          "]",
                                      t,
                                      o,
                                      s
                                  );
                        });
                    else if (o || "object" !== x.type(e)) s(i, e);
                    else for (var t in e) n(i + "[" + t + "]", e[t], o, s);
                })(i, e[i], t, n);
        return o.join("&").replace(Wt, "+");
    }),
        x.fn.extend({
            serialize: function () {
                return x.param(this.serializeArray());
            },
            serializeArray: function () {
                return this.map(function () {
                    var e = x.prop(this, "elements");
                    return e ? x.makeArray(e) : this;
                })
                    .filter(function () {
                        var e = this.type;
                        return (
                            this.name &&
                            !x(this).is(":disabled") &&
                            Bt.test(this.nodeName) &&
                            !Rt.test(e) &&
                            (this.checked || !X.test(e))
                        );
                    })
                    .map(function (e, t) {
                        var n = x(this).val();
                        return null == n
                            ? null
                            : x.isArray(n)
                            ? x.map(n, function (e) {
                                  return {
                                      name: t.name,
                                      value: e.replace(Ft, "\r\n"),
                                  };
                              })
                            : { name: t.name, value: n.replace(Ft, "\r\n") };
                    })
                    .get();
            },
        }),
        (x.ajaxSettings.xhr =
            void 0 !== h.ActiveXObject
                ? function () {
                      return (
                          (!this.isLocal &&
                              /^(get|post|head|put|delete|options)$/i.test(
                                  this.type
                              ) &&
                              Vt()) ||
                          (function () {
                              try {
                                  return new h.ActiveXObject(
                                      "Microsoft.XMLHTTP"
                                  );
                              } catch (e) {}
                          })()
                      );
                  }
                : Vt);
    var Ut = 0,
        Xt = {},
        R = x.ajaxSettings.xhr();
    function Vt() {
        try {
            return new h.XMLHttpRequest();
        } catch (e) {}
    }
    h.attachEvent &&
        h.attachEvent("onunload", function () {
            for (var e in Xt) Xt[e](void 0, !0);
        }),
        (v.cors = !!R && "withCredentials" in R),
        (R = v.ajax = !!R) &&
            x.ajaxTransport(function (l) {
                var c;
                if (!l.crossDomain || v.cors)
                    return {
                        send: function (e, s) {
                            var t,
                                r = l.xhr(),
                                a = ++Ut;
                            if (
                                (r.open(
                                    l.type,
                                    l.url,
                                    l.async,
                                    l.username,
                                    l.password
                                ),
                                l.xhrFields)
                            )
                                for (t in l.xhrFields) r[t] = l.xhrFields[t];
                            for (t in (l.mimeType &&
                                r.overrideMimeType &&
                                r.overrideMimeType(l.mimeType),
                            l.crossDomain ||
                                e["X-Requested-With"] ||
                                (e["X-Requested-With"] = "XMLHttpRequest"),
                            e))
                                void 0 !== e[t] &&
                                    r.setRequestHeader(t, e[t] + "");
                            r.send((l.hasContent && l.data) || null),
                                (c = function (e, t) {
                                    var n, i, o;
                                    if (c && (t || 4 === r.readyState))
                                        if (
                                            (delete Xt[a],
                                            (c = void 0),
                                            (r.onreadystatechange = x.noop),
                                            t)
                                        )
                                            4 !== r.readyState && r.abort();
                                        else {
                                            (o = {}),
                                                (n = r.status),
                                                "string" ==
                                                    typeof r.responseText &&
                                                    (o.text = r.responseText);
                                            try {
                                                i = r.statusText;
                                            } catch (e) {
                                                i = "";
                                            }
                                            n || !l.isLocal || l.crossDomain
                                                ? 1223 === n && (n = 204)
                                                : (n = o.text ? 200 : 404);
                                        }
                                    o && s(n, i, o, r.getAllResponseHeaders());
                                }),
                                l.async
                                    ? 4 === r.readyState
                                        ? setTimeout(c)
                                        : (r.onreadystatechange = Xt[a] = c)
                                    : c();
                        },
                        abort: function () {
                            c && c(void 0, !0);
                        },
                    };
            }),
        x.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
            },
            contents: { script: /(?:java|ecma)script/ },
            converters: {
                "text script": function (e) {
                    return x.globalEval(e), e;
                },
            },
        }),
        x.ajaxPrefilter("script", function (e) {
            void 0 === e.cache && (e.cache = !1),
                e.crossDomain && ((e.type = "GET"), (e.global = !1));
        }),
        x.ajaxTransport("script", function (t) {
            if (t.crossDomain) {
                var i,
                    o = T.head || x("head")[0] || T.documentElement;
                return {
                    send: function (e, n) {
                        ((i = T.createElement("script")).async = !0),
                            t.scriptCharset && (i.charset = t.scriptCharset),
                            (i.src = t.url),
                            (i.onload = i.onreadystatechange =
                                function (e, t) {
                                    (!t &&
                                        i.readyState &&
                                        !/loaded|complete/.test(
                                            i.readyState
                                        )) ||
                                        ((i.onload = i.onreadystatechange =
                                            null),
                                        i.parentNode &&
                                            i.parentNode.removeChild(i),
                                        (i = null),
                                        t || n(200, "success"));
                                }),
                            o.insertBefore(i, o.firstChild);
                    },
                    abort: function () {
                        i && i.onload(void 0, !0);
                    },
                };
            }
        });
    var Yt = [],
        Jt = /(=)\?(?=&|$)|\?\?/;
    x.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            var e = Yt.pop() || x.expando + "_" + Tt++;
            return (this[e] = !0), e;
        },
    }),
        x.ajaxPrefilter("json jsonp", function (e, t, n) {
            var i,
                o,
                s,
                r =
                    !1 !== e.jsonp &&
                    (Jt.test(e.url)
                        ? "url"
                        : "string" == typeof e.data &&
                          !(e.contentType || "").indexOf(
                              "application/x-www-form-urlencoded"
                          ) &&
                          Jt.test(e.data) &&
                          "data");
            return r || "jsonp" === e.dataTypes[0]
                ? ((i = e.jsonpCallback =
                      x.isFunction(e.jsonpCallback)
                          ? e.jsonpCallback()
                          : e.jsonpCallback),
                  r
                      ? (e[r] = e[r].replace(Jt, "$1" + i))
                      : !1 !== e.jsonp &&
                        (e.url +=
                            (St.test(e.url) ? "&" : "?") + e.jsonp + "=" + i),
                  (e.converters["script json"] = function () {
                      return s || x.error(i + " was not called"), s[0];
                  }),
                  (e.dataTypes[0] = "json"),
                  (o = h[i]),
                  (h[i] = function () {
                      s = arguments;
                  }),
                  n.always(function () {
                      (h[i] = o),
                          e[i] &&
                              ((e.jsonpCallback = t.jsonpCallback), Yt.push(i)),
                          s && x.isFunction(o) && o(s[0]),
                          (s = o = void 0);
                  }),
                  "script")
                : void 0;
        }),
        (x.parseHTML = function (e, t, n) {
            if (!e || "string" != typeof e) return null;
            "boolean" == typeof t && ((n = t), (t = !1)), (t = t || T);
            var i = b.exec(e),
                n = !n && [];
            return i
                ? [t.createElement(i[1])]
                : ((i = x.buildFragment([e], t, n)),
                  n && n.length && x(n).remove(),
                  x.merge([], i.childNodes));
        });
    var Gt = x.fn.load;
    (x.fn.load = function (e, t, n) {
        if ("string" != typeof e && Gt) return Gt.apply(this, arguments);
        var i,
            o,
            s,
            r = this,
            a = e.indexOf(" ");
        return (
            0 <= a && ((i = x.trim(e.slice(a, e.length))), (e = e.slice(0, a))),
            x.isFunction(t)
                ? ((n = t), (t = void 0))
                : t && "object" == typeof t && (s = "POST"),
            0 < r.length &&
                x
                    .ajax({ url: e, type: s, dataType: "html", data: t })
                    .done(function (e) {
                        (o = arguments),
                            r.html(
                                i
                                    ? x("<div>").append(x.parseHTML(e)).find(i)
                                    : e
                            );
                    })
                    .complete(
                        n &&
                            function (e, t) {
                                r.each(n, o || [e.responseText, t, e]);
                            }
                    ),
            this
        );
    }),
        x.each(
            [
                "ajaxStart",
                "ajaxStop",
                "ajaxComplete",
                "ajaxError",
                "ajaxSuccess",
                "ajaxSend",
            ],
            function (e, t) {
                x.fn[t] = function (e) {
                    return this.on(t, e);
                };
            }
        ),
        (x.expr.filters.animated = function (t) {
            return x.grep(x.timers, function (e) {
                return t === e.elem;
            }).length;
        });
    var Qt = h.document.documentElement;
    function Kt(e) {
        return x.isWindow(e)
            ? e
            : 9 === e.nodeType && (e.defaultView || e.parentWindow);
    }
    (x.offset = {
        setOffset: function (e, t, n) {
            var i,
                o,
                s,
                r,
                a = x.css(e, "position"),
                l = x(e),
                c = {};
            "static" === a && (e.style.position = "relative"),
                (s = l.offset()),
                (i = x.css(e, "top")),
                (r = x.css(e, "left")),
                (r =
                    ("absolute" === a || "fixed" === a) &&
                    -1 < x.inArray("auto", [i, r])
                        ? ((o = (a = l.position()).top), a.left)
                        : ((o = parseFloat(i) || 0), parseFloat(r) || 0)),
                null != (t = x.isFunction(t) ? t.call(e, n, s) : t).top &&
                    (c.top = t.top - s.top + o),
                null != t.left && (c.left = t.left - s.left + r),
                "using" in t ? t.using.call(e, c) : l.css(c);
        },
    }),
        x.fn.extend({
            offset: function (t) {
                if (arguments.length)
                    return void 0 === t
                        ? this
                        : this.each(function (e) {
                              x.offset.setOffset(this, t, e);
                          });
                var e,
                    n = { top: 0, left: 0 },
                    i = this[0],
                    o = i && i.ownerDocument;
                return o
                    ? ((e = o.documentElement),
                      x.contains(e, i)
                          ? (typeof i.getBoundingClientRect !== P &&
                                (n = i.getBoundingClientRect()),
                            (o = Kt(o)),
                            {
                                top:
                                    n.top +
                                    (o.pageYOffset || e.scrollTop) -
                                    (e.clientTop || 0),
                                left:
                                    n.left +
                                    (o.pageXOffset || e.scrollLeft) -
                                    (e.clientLeft || 0),
                            })
                          : n)
                    : void 0;
            },
            position: function () {
                if (this[0]) {
                    var e,
                        t,
                        n = { top: 0, left: 0 },
                        i = this[0];
                    return (
                        "fixed" === x.css(i, "position")
                            ? (t = i.getBoundingClientRect())
                            : ((e = this.offsetParent()),
                              (t = this.offset()),
                              ((n = !x.nodeName(e[0], "html")
                                  ? e.offset()
                                  : n).top += x.css(
                                  e[0],
                                  "borderTopWidth",
                                  !0
                              )),
                              (n.left += x.css(e[0], "borderLeftWidth", !0))),
                        {
                            top: t.top - n.top - x.css(i, "marginTop", !0),
                            left: t.left - n.left - x.css(i, "marginLeft", !0),
                        }
                    );
                }
            },
            offsetParent: function () {
                return this.map(function () {
                    for (
                        var e = this.offsetParent || Qt;
                        e &&
                        !x.nodeName(e, "html") &&
                        "static" === x.css(e, "position");

                    )
                        e = e.offsetParent;
                    return e || Qt;
                });
            },
        }),
        x.each(
            { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
            function (t, o) {
                var s = /Y/.test(o);
                x.fn[t] = function (e) {
                    return U(
                        this,
                        function (e, t, n) {
                            var i = Kt(e);
                            return void 0 === n
                                ? i
                                    ? o in i
                                        ? i[o]
                                        : i.document.documentElement[t]
                                    : e[t]
                                : void (i
                                      ? i.scrollTo(
                                            s ? x(i).scrollLeft() : n,
                                            s ? n : x(i).scrollTop()
                                        )
                                      : (e[t] = n));
                        },
                        t,
                        e,
                        arguments.length,
                        null
                    );
                };
            }
        ),
        x.each(["top", "left"], function (e, n) {
            x.cssHooks[n] = Me(v.pixelPosition, function (e, t) {
                return t
                    ? ((t = Ee(e, n)),
                      Le.test(t) ? x(e).position()[n] + "px" : t)
                    : void 0;
            });
        }),
        x.each({ Height: "height", Width: "width" }, function (s, r) {
            x.each(
                { padding: "inner" + s, content: r, "": "outer" + s },
                function (i, e) {
                    x.fn[e] = function (e, t) {
                        var n =
                                arguments.length &&
                                (i || "boolean" != typeof e),
                            o =
                                i ||
                                (!0 === e || !0 === t ? "margin" : "border");
                        return U(
                            this,
                            function (e, t, n) {
                                var i;
                                return x.isWindow(e)
                                    ? e.document.documentElement["client" + s]
                                    : 9 === e.nodeType
                                    ? ((i = e.documentElement),
                                      Math.max(
                                          e.body["scroll" + s],
                                          i["scroll" + s],
                                          e.body["offset" + s],
                                          i["offset" + s],
                                          i["client" + s]
                                      ))
                                    : void 0 === n
                                    ? x.css(e, t, o)
                                    : x.style(e, t, n, o);
                            },
                            r,
                            n ? e : void 0,
                            n,
                            null
                        );
                    };
                }
            );
        }),
        (x.fn.size = function () {
            return this.length;
        }),
        (x.fn.andSelf = x.fn.addBack),
        "function" == typeof define &&
            define.amd &&
            define("jquery", [], function () {
                return x;
            });
    var Zt = h.jQuery,
        en = h.$;
    return (
        (x.noConflict = function (e) {
            return (
                h.$ === x && (h.$ = en),
                e && h.jQuery === x && (h.jQuery = Zt),
                x
            );
        }),
        typeof e === P && (h.jQuery = h.$ = x),
        x
    );
}),
    (function (e) {
        "use strict";
        "function" == typeof define && define.amd
            ? define(["jquery"], e)
            : "undefined" != typeof exports
            ? (module.exports = e(require("jquery")))
            : e(jQuery);
    })(function (c) {
        "use strict";
        var i,
            r = window.Slick || {};
        (i = 0),
            ((r = function (e, t) {
                var n = this;
                (n.defaults = {
                    accessibility: !0,
                    adaptiveHeight: !1,
                    appendArrows: c(e),
                    appendDots: c(e),
                    arrows: !0,
                    asNavFor: null,
                    prevArrow:
                        '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                    nextArrow:
                        '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                    autoplay: !1,
                    autoplaySpeed: 3e3,
                    centerMode: !1,
                    centerPadding: "50px",
                    cssEase: "ease",
                    customPaging: function (e, t) {
                        return c('<button type="button" />').text(t + 1);
                    },
                    dots: !1,
                    dotsClass: "slick-dots",
                    draggable: !0,
                    easing: "linear",
                    edgeFriction: 0.35,
                    fade: !1,
                    focusOnSelect: !1,
                    focusOnChange: !1,
                    infinite: !0,
                    initialSlide: 0,
                    lazyLoad: "ondemand",
                    mobileFirst: !1,
                    pauseOnHover: !0,
                    pauseOnFocus: !0,
                    pauseOnDotsHover: !1,
                    respondTo: "window",
                    responsive: null,
                    rows: 1,
                    rtl: !1,
                    slide: "",
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 500,
                    swipe: !0,
                    swipeToSlide: !1,
                    touchMove: !0,
                    touchThreshold: 5,
                    useCSS: !0,
                    useTransform: !0,
                    variableWidth: !1,
                    vertical: !1,
                    verticalSwiping: !1,
                    waitForAnimate: !0,
                    zIndex: 1e3,
                }),
                    (n.initials = {
                        animating: !1,
                        dragging: !1,
                        autoPlayTimer: null,
                        currentDirection: 0,
                        currentLeft: null,
                        currentSlide: 0,
                        direction: 1,
                        $dots: null,
                        listWidth: null,
                        listHeight: null,
                        loadIndex: 0,
                        $nextArrow: null,
                        $prevArrow: null,
                        scrolling: !1,
                        slideCount: null,
                        slideWidth: null,
                        $slideTrack: null,
                        $slides: null,
                        sliding: !1,
                        slideOffset: 0,
                        swipeLeft: null,
                        swiping: !1,
                        $list: null,
                        touchObject: {},
                        transformsEnabled: !1,
                        unslicked: !1,
                    }),
                    c.extend(n, n.initials),
                    (n.activeBreakpoint = null),
                    (n.animType = null),
                    (n.animProp = null),
                    (n.breakpoints = []),
                    (n.breakpointSettings = []),
                    (n.cssTransitions = !1),
                    (n.focussed = !1),
                    (n.interrupted = !1),
                    (n.hidden = "hidden"),
                    (n.paused = !0),
                    (n.positionProp = null),
                    (n.respondTo = null),
                    (n.rowCount = 1),
                    (n.shouldClick = !0),
                    (n.$slider = c(e)),
                    (n.$slidesCache = null),
                    (n.transformType = null),
                    (n.transitionType = null),
                    (n.visibilityChange = "visibilitychange"),
                    (n.windowWidth = 0),
                    (n.windowTimer = null),
                    (e = c(e).data("slick") || {}),
                    (n.options = c.extend({}, n.defaults, t, e)),
                    (n.currentSlide = n.options.initialSlide),
                    (n.originalSettings = n.options),
                    void 0 !== document.mozHidden
                        ? ((n.hidden = "mozHidden"),
                          (n.visibilityChange = "mozvisibilitychange"))
                        : void 0 !== document.webkitHidden &&
                          ((n.hidden = "webkitHidden"),
                          (n.visibilityChange = "webkitvisibilitychange")),
                    (n.autoPlay = c.proxy(n.autoPlay, n)),
                    (n.autoPlayClear = c.proxy(n.autoPlayClear, n)),
                    (n.autoPlayIterator = c.proxy(n.autoPlayIterator, n)),
                    (n.changeSlide = c.proxy(n.changeSlide, n)),
                    (n.clickHandler = c.proxy(n.clickHandler, n)),
                    (n.selectHandler = c.proxy(n.selectHandler, n)),
                    (n.setPosition = c.proxy(n.setPosition, n)),
                    (n.swipeHandler = c.proxy(n.swipeHandler, n)),
                    (n.dragHandler = c.proxy(n.dragHandler, n)),
                    (n.keyHandler = c.proxy(n.keyHandler, n)),
                    (n.instanceUid = i++),
                    (n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/),
                    n.registerBreakpoints(),
                    n.init(!0);
            }).prototype.activateADA = function () {
                this.$slideTrack
                    .find(".slick-active")
                    .attr({ "aria-hidden": "false" })
                    .find("a, input, button, select")
                    .attr({ tabindex: "0" });
            }),
            (r.prototype.addSlide = r.prototype.slickAdd =
                function (e, t, n) {
                    var i = this;
                    if ("boolean" == typeof t) (n = t), (t = null);
                    else if (t < 0 || t >= i.slideCount) return !1;
                    i.unload(),
                        "number" == typeof t
                            ? 0 === t && 0 === i.$slides.length
                                ? c(e).appendTo(i.$slideTrack)
                                : n
                                ? c(e).insertBefore(i.$slides.eq(t))
                                : c(e).insertAfter(i.$slides.eq(t))
                            : !0 === n
                            ? c(e).prependTo(i.$slideTrack)
                            : c(e).appendTo(i.$slideTrack),
                        (i.$slides = i.$slideTrack.children(
                            this.options.slide
                        )),
                        i.$slideTrack.children(this.options.slide).detach(),
                        i.$slideTrack.append(i.$slides),
                        i.$slides.each(function (e, t) {
                            c(t).attr("data-slick-index", e);
                        }),
                        (i.$slidesCache = i.$slides),
                        i.reinit();
                }),
            (r.prototype.animateHeight = function () {
                var e,
                    t = this;
                1 === t.options.slidesToShow &&
                    !0 === t.options.adaptiveHeight &&
                    !1 === t.options.vertical &&
                    ((e = t.$slides.eq(t.currentSlide).outerHeight(!0)),
                    t.$list.animate({ height: e }, t.options.speed));
            }),
            (r.prototype.animateSlide = function (e, t) {
                var n = {},
                    i = this;
                i.animateHeight(),
                    !0 === i.options.rtl &&
                        !1 === i.options.vertical &&
                        (e = -e),
                    !1 === i.transformsEnabled
                        ? !1 === i.options.vertical
                            ? i.$slideTrack.animate(
                                  { left: e },
                                  i.options.speed,
                                  i.options.easing,
                                  t
                              )
                            : i.$slideTrack.animate(
                                  { top: e },
                                  i.options.speed,
                                  i.options.easing,
                                  t
                              )
                        : !1 === i.cssTransitions
                        ? (!0 === i.options.rtl &&
                              (i.currentLeft = -i.currentLeft),
                          c({ animStart: i.currentLeft }).animate(
                              { animStart: e },
                              {
                                  duration: i.options.speed,
                                  easing: i.options.easing,
                                  step: function (e) {
                                      (e = Math.ceil(e)),
                                          !1 === i.options.vertical
                                              ? (n[i.animType] =
                                                    "translate(" +
                                                    e +
                                                    "px, 0px)")
                                              : (n[i.animType] =
                                                    "translate(0px," +
                                                    e +
                                                    "px)"),
                                          i.$slideTrack.css(n);
                                  },
                                  complete: function () {
                                      t && t.call();
                                  },
                              }
                          ))
                        : (i.applyTransition(),
                          (e = Math.ceil(e)),
                          !1 === i.options.vertical
                              ? (n[i.animType] =
                                    "translate3d(" + e + "px, 0px, 0px)")
                              : (n[i.animType] =
                                    "translate3d(0px," + e + "px, 0px)"),
                          i.$slideTrack.css(n),
                          t &&
                              setTimeout(function () {
                                  i.disableTransition(), t.call();
                              }, i.options.speed));
            }),
            (r.prototype.getNavTarget = function () {
                var e = this.options.asNavFor;
                return (e = e && null !== e ? c(e).not(this.$slider) : e);
            }),
            (r.prototype.asNavFor = function (t) {
                var e = this.getNavTarget();
                null !== e &&
                    "object" == typeof e &&
                    e.each(function () {
                        var e = c(this).slick("getSlick");
                        e.unslicked || e.slideHandler(t, !0);
                    });
            }),
            (r.prototype.applyTransition = function (e) {
                var t = this,
                    n = {};
                !1 === t.options.fade
                    ? (n[t.transitionType] =
                          t.transformType +
                          " " +
                          t.options.speed +
                          "ms " +
                          t.options.cssEase)
                    : (n[t.transitionType] =
                          "opacity " +
                          t.options.speed +
                          "ms " +
                          t.options.cssEase),
                    (!1 === t.options.fade
                        ? t.$slideTrack
                        : t.$slides.eq(e)
                    ).css(n);
            }),
            (r.prototype.autoPlay = function () {
                var e = this;
                e.autoPlayClear(),
                    e.slideCount > e.options.slidesToShow &&
                        (e.autoPlayTimer = setInterval(
                            e.autoPlayIterator,
                            e.options.autoplaySpeed
                        ));
            }),
            (r.prototype.autoPlayClear = function () {
                this.autoPlayTimer && clearInterval(this.autoPlayTimer);
            }),
            (r.prototype.autoPlayIterator = function () {
                var e = this,
                    t = e.currentSlide + e.options.slidesToScroll;
                e.paused ||
                    e.interrupted ||
                    e.focussed ||
                    (!1 === e.options.infinite &&
                        (1 === e.direction &&
                        e.currentSlide + 1 === e.slideCount - 1
                            ? (e.direction = 0)
                            : 0 === e.direction &&
                              ((t = e.currentSlide - e.options.slidesToScroll),
                              e.currentSlide - 1 == 0 && (e.direction = 1))),
                    e.slideHandler(t));
            }),
            (r.prototype.buildArrows = function () {
                var e = this;
                !0 === e.options.arrows &&
                    ((e.$prevArrow = c(e.options.prevArrow).addClass(
                        "slick-arrow"
                    )),
                    (e.$nextArrow = c(e.options.nextArrow).addClass(
                        "slick-arrow"
                    )),
                    e.slideCount > e.options.slidesToShow
                        ? (e.$prevArrow
                              .removeClass("slick-hidden")
                              .removeAttr("aria-hidden tabindex"),
                          e.$nextArrow
                              .removeClass("slick-hidden")
                              .removeAttr("aria-hidden tabindex"),
                          e.htmlExpr.test(e.options.prevArrow) &&
                              e.$prevArrow.prependTo(e.options.appendArrows),
                          e.htmlExpr.test(e.options.nextArrow) &&
                              e.$nextArrow.appendTo(e.options.appendArrows),
                          !0 !== e.options.infinite &&
                              e.$prevArrow
                                  .addClass("slick-disabled")
                                  .attr("aria-disabled", "true"))
                        : e.$prevArrow
                              .add(e.$nextArrow)
                              .addClass("slick-hidden")
                              .attr({
                                  "aria-disabled": "true",
                                  tabindex: "-1",
                              }));
            }),
            (r.prototype.buildDots = function () {
                var e,
                    t,
                    n = this;
                if (!0 === n.options.dots) {
                    for (
                        n.$slider.addClass("slick-dotted"),
                            t = c("<ul />").addClass(n.options.dotsClass),
                            e = 0;
                        e <= n.getDotCount();
                        e += 1
                    )
                        t.append(
                            c("<li />").append(
                                n.options.customPaging.call(this, n, e)
                            )
                        );
                    (n.$dots = t.appendTo(n.options.appendDots)),
                        n.$dots.find("li").first().addClass("slick-active");
                }
            }),
            (r.prototype.buildOut = function () {
                var e = this;
                (e.$slides = e.$slider
                    .children(e.options.slide + ":not(.slick-cloned)")
                    .addClass("slick-slide")),
                    (e.slideCount = e.$slides.length),
                    e.$slides.each(function (e, t) {
                        c(t)
                            .attr("data-slick-index", e)
                            .data("originalStyling", c(t).attr("style") || "");
                    }),
                    e.$slider.addClass("slick-slider"),
                    (e.$slideTrack =
                        0 === e.slideCount
                            ? c('<div class="slick-track"/>').appendTo(
                                  e.$slider
                              )
                            : e.$slides
                                  .wrapAll('<div class="slick-track"/>')
                                  .parent()),
                    (e.$list = e.$slideTrack
                        .wrap('<div class="slick-list"/>')
                        .parent()),
                    e.$slideTrack.css("opacity", 0),
                    (!0 !== e.options.centerMode &&
                        !0 !== e.options.swipeToSlide) ||
                        (e.options.slidesToScroll = 1),
                    c("img[data-lazy]", e.$slider)
                        .not("[src]")
                        .addClass("slick-loading"),
                    e.setupInfinite(),
                    e.buildArrows(),
                    e.buildDots(),
                    e.updateDots(),
                    e.setSlideClasses(
                        "number" == typeof e.currentSlide ? e.currentSlide : 0
                    ),
                    !0 === e.options.draggable && e.$list.addClass("draggable");
            }),
            (r.prototype.buildRows = function () {
                var e,
                    t,
                    n,
                    i = this,
                    o = document.createDocumentFragment(),
                    s = i.$slider.children();
                if (1 < i.options.rows) {
                    for (
                        n = i.options.slidesPerRow * i.options.rows,
                            t = Math.ceil(s.length / n),
                            e = 0;
                        e < t;
                        e++
                    ) {
                        for (
                            var r = document.createElement("div"), a = 0;
                            a < i.options.rows;
                            a++
                        ) {
                            for (
                                var l = document.createElement("div"), c = 0;
                                c < i.options.slidesPerRow;
                                c++
                            ) {
                                var d =
                                    e * n + (a * i.options.slidesPerRow + c);
                                s.get(d) && l.appendChild(s.get(d));
                            }
                            r.appendChild(l);
                        }
                        o.appendChild(r);
                    }
                    i.$slider.empty().append(o),
                        i.$slider
                            .children()
                            .children()
                            .children()
                            .css({
                                width: 100 / i.options.slidesPerRow + "%",
                                display: "inline-block",
                            });
                }
            }),
            (r.prototype.checkResponsive = function (e, t) {
                var n,
                    i,
                    o,
                    s = this,
                    r = !1,
                    a = s.$slider.width(),
                    l = window.innerWidth || c(window).width();
                if (
                    ("window" === s.respondTo
                        ? (o = l)
                        : "slider" === s.respondTo
                        ? (o = a)
                        : "min" === s.respondTo && (o = Math.min(l, a)),
                    s.options.responsive &&
                        s.options.responsive.length &&
                        null !== s.options.responsive)
                ) {
                    for (n in ((i = null), s.breakpoints))
                        s.breakpoints.hasOwnProperty(n) &&
                            (!1 === s.originalSettings.mobileFirst
                                ? o < s.breakpoints[n] && (i = s.breakpoints[n])
                                : o > s.breakpoints[n] &&
                                  (i = s.breakpoints[n]));
                    null !== i
                        ? (null !== s.activeBreakpoint &&
                              i === s.activeBreakpoint &&
                              !t) ||
                          ((s.activeBreakpoint = i),
                          "unslick" === s.breakpointSettings[i]
                              ? s.unslick(i)
                              : ((s.options = c.extend(
                                    {},
                                    s.originalSettings,
                                    s.breakpointSettings[i]
                                )),
                                !0 === e &&
                                    (s.currentSlide = s.options.initialSlide),
                                s.refresh(e)),
                          (r = i))
                        : null !== s.activeBreakpoint &&
                          ((s.activeBreakpoint = null),
                          (s.options = s.originalSettings),
                          !0 === e && (s.currentSlide = s.options.initialSlide),
                          s.refresh(e),
                          (r = i)),
                        e ||
                            !1 === r ||
                            s.$slider.trigger("breakpoint", [s, r]);
                }
            }),
            (r.prototype.changeSlide = function (e, t) {
                var n,
                    i = this,
                    o = c(e.currentTarget);
                switch (
                    (o.is("a") && e.preventDefault(),
                    o.is("li") || (o = o.closest("li")),
                    (n =
                        i.slideCount % i.options.slidesToScroll != 0
                            ? 0
                            : (i.slideCount - i.currentSlide) %
                              i.options.slidesToScroll),
                    e.data.message)
                ) {
                    case "previous":
                        (s =
                            0 == n
                                ? i.options.slidesToScroll
                                : i.options.slidesToShow - n),
                            i.slideCount > i.options.slidesToShow &&
                                i.slideHandler(i.currentSlide - s, !1, t);
                        break;
                    case "next":
                        (s = 0 == n ? i.options.slidesToScroll : n),
                            i.slideCount > i.options.slidesToShow &&
                                i.slideHandler(i.currentSlide + s, !1, t);
                        break;
                    case "index":
                        var s =
                            0 === e.data.index
                                ? 0
                                : e.data.index ||
                                  o.index() * i.options.slidesToScroll;
                        i.slideHandler(i.checkNavigable(s), !1, t),
                            o.children().trigger("focus");
                        break;
                    default:
                        return;
                }
            }),
            (r.prototype.checkNavigable = function (e) {
                var t = this.getNavigableIndexes(),
                    n = 0;
                if (e > t[t.length - 1]) e = t[t.length - 1];
                else
                    for (var i in t) {
                        if (e < t[i]) {
                            e = n;
                            break;
                        }
                        n = t[i];
                    }
                return e;
            }),
            (r.prototype.cleanUpEvents = function () {
                var e = this;
                e.options.dots &&
                    null !== e.$dots &&
                    (c("li", e.$dots)
                        .off("click.slick", e.changeSlide)
                        .off("mouseenter.slick", c.proxy(e.interrupt, e, !0))
                        .off("mouseleave.slick", c.proxy(e.interrupt, e, !1)),
                    !0 === e.options.accessibility &&
                        e.$dots.off("keydown.slick", e.keyHandler)),
                    e.$slider.off("focus.slick blur.slick"),
                    !0 === e.options.arrows &&
                        e.slideCount > e.options.slidesToShow &&
                        (e.$prevArrow &&
                            e.$prevArrow.off("click.slick", e.changeSlide),
                        e.$nextArrow &&
                            e.$nextArrow.off("click.slick", e.changeSlide),
                        !0 === e.options.accessibility &&
                            (e.$prevArrow &&
                                e.$prevArrow.off("keydown.slick", e.keyHandler),
                            e.$nextArrow &&
                                e.$nextArrow.off(
                                    "keydown.slick",
                                    e.keyHandler
                                ))),
                    e.$list.off(
                        "touchstart.slick mousedown.slick",
                        e.swipeHandler
                    ),
                    e.$list.off(
                        "touchmove.slick mousemove.slick",
                        e.swipeHandler
                    ),
                    e.$list.off("touchend.slick mouseup.slick", e.swipeHandler),
                    e.$list.off(
                        "touchcancel.slick mouseleave.slick",
                        e.swipeHandler
                    ),
                    e.$list.off("click.slick", e.clickHandler),
                    c(document).off(e.visibilityChange, e.visibility),
                    e.cleanUpSlideEvents(),
                    !0 === e.options.accessibility &&
                        e.$list.off("keydown.slick", e.keyHandler),
                    !0 === e.options.focusOnSelect &&
                        c(e.$slideTrack)
                            .children()
                            .off("click.slick", e.selectHandler),
                    c(window).off(
                        "orientationchange.slick.slick-" + e.instanceUid,
                        e.orientationChange
                    ),
                    c(window).off(
                        "resize.slick.slick-" + e.instanceUid,
                        e.resize
                    ),
                    c("[draggable!=true]", e.$slideTrack).off(
                        "dragstart",
                        e.preventDefault
                    ),
                    c(window).off(
                        "load.slick.slick-" + e.instanceUid,
                        e.setPosition
                    );
            }),
            (r.prototype.cleanUpSlideEvents = function () {
                var e = this;
                e.$list.off("mouseenter.slick", c.proxy(e.interrupt, e, !0)),
                    e.$list.off(
                        "mouseleave.slick",
                        c.proxy(e.interrupt, e, !1)
                    );
            }),
            (r.prototype.cleanUpRows = function () {
                var e;
                1 < this.options.rows &&
                    ((e = this.$slides.children().children()).removeAttr(
                        "style"
                    ),
                    this.$slider.empty().append(e));
            }),
            (r.prototype.clickHandler = function (e) {
                !1 === this.shouldClick &&
                    (e.stopImmediatePropagation(),
                    e.stopPropagation(),
                    e.preventDefault());
            }),
            (r.prototype.destroy = function (e) {
                var t = this;
                t.autoPlayClear(),
                    (t.touchObject = {}),
                    t.cleanUpEvents(),
                    c(".slick-cloned", t.$slider).detach(),
                    t.$dots && t.$dots.remove(),
                    t.$prevArrow &&
                        t.$prevArrow.length &&
                        (t.$prevArrow
                            .removeClass(
                                "slick-disabled slick-arrow slick-hidden"
                            )
                            .removeAttr("aria-hidden aria-disabled tabindex")
                            .css("display", ""),
                        t.htmlExpr.test(t.options.prevArrow) &&
                            t.$prevArrow.remove()),
                    t.$nextArrow &&
                        t.$nextArrow.length &&
                        (t.$nextArrow
                            .removeClass(
                                "slick-disabled slick-arrow slick-hidden"
                            )
                            .removeAttr("aria-hidden aria-disabled tabindex")
                            .css("display", ""),
                        t.htmlExpr.test(t.options.nextArrow) &&
                            t.$nextArrow.remove()),
                    t.$slides &&
                        (t.$slides
                            .removeClass(
                                "slick-slide slick-active slick-center slick-visible slick-current"
                            )
                            .removeAttr("aria-hidden")
                            .removeAttr("data-slick-index")
                            .each(function () {
                                c(this).attr(
                                    "style",
                                    c(this).data("originalStyling")
                                );
                            }),
                        t.$slideTrack.children(this.options.slide).detach(),
                        t.$slideTrack.detach(),
                        t.$list.detach(),
                        t.$slider.append(t.$slides)),
                    t.cleanUpRows(),
                    t.$slider.removeClass("slick-slider"),
                    t.$slider.removeClass("slick-initialized"),
                    t.$slider.removeClass("slick-dotted"),
                    (t.unslicked = !0),
                    e || t.$slider.trigger("destroy", [t]);
            }),
            (r.prototype.disableTransition = function (e) {
                var t = {};
                (t[this.transitionType] = ""),
                    (!1 === this.options.fade
                        ? this.$slideTrack
                        : this.$slides.eq(e)
                    ).css(t);
            }),
            (r.prototype.fadeSlide = function (e, t) {
                var n = this;
                !1 === n.cssTransitions
                    ? (n.$slides.eq(e).css({ zIndex: n.options.zIndex }),
                      n.$slides
                          .eq(e)
                          .animate(
                              { opacity: 1 },
                              n.options.speed,
                              n.options.easing,
                              t
                          ))
                    : (n.applyTransition(e),
                      n.$slides
                          .eq(e)
                          .css({ opacity: 1, zIndex: n.options.zIndex }),
                      t &&
                          setTimeout(function () {
                              n.disableTransition(e), t.call();
                          }, n.options.speed));
            }),
            (r.prototype.fadeSlideOut = function (e) {
                var t = this;
                !1 === t.cssTransitions
                    ? t.$slides
                          .eq(e)
                          .animate(
                              { opacity: 0, zIndex: t.options.zIndex - 2 },
                              t.options.speed,
                              t.options.easing
                          )
                    : (t.applyTransition(e),
                      t.$slides
                          .eq(e)
                          .css({ opacity: 0, zIndex: t.options.zIndex - 2 }));
            }),
            (r.prototype.filterSlides = r.prototype.slickFilter =
                function (e) {
                    var t = this;
                    null !== e &&
                        ((t.$slidesCache = t.$slides),
                        t.unload(),
                        t.$slideTrack.children(this.options.slide).detach(),
                        t.$slidesCache.filter(e).appendTo(t.$slideTrack),
                        t.reinit());
                }),
            (r.prototype.focusHandler = function () {
                var n = this;
                n.$slider
                    .off("focus.slick blur.slick")
                    .on("focus.slick blur.slick", "*", function (e) {
                        e.stopImmediatePropagation();
                        var t = c(this);
                        setTimeout(function () {
                            n.options.pauseOnFocus &&
                                ((n.focussed = t.is(":focus")), n.autoPlay());
                        }, 0);
                    });
            }),
            (r.prototype.getCurrent = r.prototype.slickCurrentSlide =
                function () {
                    return this.currentSlide;
                }),
            (r.prototype.getDotCount = function () {
                var e = this,
                    t = 0,
                    n = 0,
                    i = 0;
                if (!0 === e.options.infinite)
                    if (e.slideCount <= e.options.slidesToShow) ++i;
                    else
                        for (; t < e.slideCount; )
                            ++i,
                                (t = n + e.options.slidesToScroll),
                                (n +=
                                    e.options.slidesToScroll <=
                                    e.options.slidesToShow
                                        ? e.options.slidesToScroll
                                        : e.options.slidesToShow);
                else if (!0 === e.options.centerMode) i = e.slideCount;
                else if (e.options.asNavFor)
                    for (; t < e.slideCount; )
                        ++i,
                            (t = n + e.options.slidesToScroll),
                            (n +=
                                e.options.slidesToScroll <=
                                e.options.slidesToShow
                                    ? e.options.slidesToScroll
                                    : e.options.slidesToShow);
                else
                    i =
                        1 +
                        Math.ceil(
                            (e.slideCount - e.options.slidesToShow) /
                                e.options.slidesToScroll
                        );
                return i - 1;
            }),
            (r.prototype.getLeft = function (e) {
                var t,
                    n,
                    i = this,
                    o = 0;
                return (
                    (i.slideOffset = 0),
                    (t = i.$slides.first().outerHeight(!0)),
                    !0 === i.options.infinite
                        ? (i.slideCount > i.options.slidesToShow &&
                              ((i.slideOffset =
                                  i.slideWidth * i.options.slidesToShow * -1),
                              (n = -1),
                              !0 === i.options.vertical &&
                                  !0 === i.options.centerMode &&
                                  (2 === i.options.slidesToShow
                                      ? (n = -1.5)
                                      : 1 === i.options.slidesToShow &&
                                        (n = -2)),
                              (o = t * i.options.slidesToShow * n)),
                          i.slideCount % i.options.slidesToScroll != 0 &&
                              e + i.options.slidesToScroll > i.slideCount &&
                              i.slideCount > i.options.slidesToShow &&
                              (o =
                                  e > i.slideCount
                                      ? ((i.slideOffset =
                                            (i.options.slidesToShow -
                                                (e - i.slideCount)) *
                                            i.slideWidth *
                                            -1),
                                        (i.options.slidesToShow -
                                            (e - i.slideCount)) *
                                            t *
                                            -1)
                                      : ((i.slideOffset =
                                            (i.slideCount %
                                                i.options.slidesToScroll) *
                                            i.slideWidth *
                                            -1),
                                        (i.slideCount %
                                            i.options.slidesToScroll) *
                                            t *
                                            -1)))
                        : e + i.options.slidesToShow > i.slideCount &&
                          ((i.slideOffset =
                              (e + i.options.slidesToShow - i.slideCount) *
                              i.slideWidth),
                          (o =
                              (e + i.options.slidesToShow - i.slideCount) * t)),
                    i.slideCount <= i.options.slidesToShow &&
                        (o = i.slideOffset = 0),
                    !0 === i.options.centerMode &&
                    i.slideCount <= i.options.slidesToShow
                        ? (i.slideOffset =
                              (i.slideWidth *
                                  Math.floor(i.options.slidesToShow)) /
                                  2 -
                              (i.slideWidth * i.slideCount) / 2)
                        : !0 === i.options.centerMode &&
                          !0 === i.options.infinite
                        ? (i.slideOffset +=
                              i.slideWidth *
                                  Math.floor(i.options.slidesToShow / 2) -
                              i.slideWidth)
                        : !0 === i.options.centerMode &&
                          ((i.slideOffset = 0),
                          (i.slideOffset +=
                              i.slideWidth *
                              Math.floor(i.options.slidesToShow / 2))),
                    (t =
                        !1 === i.options.vertical
                            ? e * i.slideWidth * -1 + i.slideOffset
                            : e * t * -1 + o),
                    !0 === i.options.variableWidth &&
                        ((o =
                            i.slideCount <= i.options.slidesToShow ||
                            !1 === i.options.infinite
                                ? i.$slideTrack.children(".slick-slide").eq(e)
                                : i.$slideTrack
                                      .children(".slick-slide")
                                      .eq(e + i.options.slidesToShow)),
                        (t =
                            !0 === i.options.rtl
                                ? o[0]
                                    ? -1 *
                                      (i.$slideTrack.width() -
                                          o[0].offsetLeft -
                                          o.width())
                                    : 0
                                : o[0]
                                ? -1 * o[0].offsetLeft
                                : 0),
                        !0 === i.options.centerMode &&
                            ((o =
                                i.slideCount <= i.options.slidesToShow ||
                                !1 === i.options.infinite
                                    ? i.$slideTrack
                                          .children(".slick-slide")
                                          .eq(e)
                                    : i.$slideTrack
                                          .children(".slick-slide")
                                          .eq(e + i.options.slidesToShow + 1)),
                            (t =
                                !0 === i.options.rtl
                                    ? o[0]
                                        ? -1 *
                                          (i.$slideTrack.width() -
                                              o[0].offsetLeft -
                                              o.width())
                                        : 0
                                    : o[0]
                                    ? -1 * o[0].offsetLeft
                                    : 0),
                            (t += (i.$list.width() - o.outerWidth()) / 2))),
                    t
                );
            }),
            (r.prototype.getOption = r.prototype.slickGetOption =
                function (e) {
                    return this.options[e];
                }),
            (r.prototype.getNavigableIndexes = function () {
                for (
                    var e = this,
                        t = 0,
                        n = 0,
                        i = [],
                        o =
                            !1 === e.options.infinite
                                ? e.slideCount
                                : ((t = -1 * e.options.slidesToScroll),
                                  (n = -1 * e.options.slidesToScroll),
                                  2 * e.slideCount);
                    t < o;

                )
                    i.push(t),
                        (t = n + e.options.slidesToScroll),
                        (n +=
                            e.options.slidesToScroll <= e.options.slidesToShow
                                ? e.options.slidesToScroll
                                : e.options.slidesToShow);
                return i;
            }),
            (r.prototype.getSlick = function () {
                return this;
            }),
            (r.prototype.getSlideCount = function () {
                var n,
                    i = this,
                    o =
                        !0 === i.options.centerMode
                            ? i.slideWidth *
                              Math.floor(i.options.slidesToShow / 2)
                            : 0;
                return !0 === i.options.swipeToSlide
                    ? (i.$slideTrack.find(".slick-slide").each(function (e, t) {
                          if (
                              t.offsetLeft - o + c(t).outerWidth() / 2 >
                              -1 * i.swipeLeft
                          )
                              return (n = t), !1;
                      }),
                      Math.abs(
                          c(n).attr("data-slick-index") - i.currentSlide
                      ) || 1)
                    : i.options.slidesToScroll;
            }),
            (r.prototype.goTo = r.prototype.slickGoTo =
                function (e, t) {
                    this.changeSlide(
                        { data: { message: "index", index: parseInt(e) } },
                        t
                    );
                }),
            (r.prototype.init = function (e) {
                var t = this;
                c(t.$slider).hasClass("slick-initialized") ||
                    (c(t.$slider).addClass("slick-initialized"),
                    t.buildRows(),
                    t.buildOut(),
                    t.setProps(),
                    t.startLoad(),
                    t.loadSlider(),
                    t.initializeEvents(),
                    t.updateArrows(),
                    t.updateDots(),
                    t.checkResponsive(!0),
                    t.focusHandler()),
                    e && t.$slider.trigger("init", [t]),
                    !0 === t.options.accessibility && t.initADA(),
                    t.options.autoplay && ((t.paused = !1), t.autoPlay());
            }),
            (r.prototype.initADA = function () {
                var n = this,
                    i = Math.ceil(n.slideCount / n.options.slidesToShow),
                    o = n.getNavigableIndexes().filter(function (e) {
                        return 0 <= e && e < n.slideCount;
                    });
                n.$slides
                    .add(n.$slideTrack.find(".slick-cloned"))
                    .attr({ "aria-hidden": "true", tabindex: "-1" })
                    .find("a, input, button, select")
                    .attr({ tabindex: "-1" }),
                    null !== n.$dots &&
                        (n.$slides
                            .not(n.$slideTrack.find(".slick-cloned"))
                            .each(function (e) {
                                var t = o.indexOf(e);
                                c(this).attr({
                                    role: "tabpanel",
                                    id: "slick-slide" + n.instanceUid + e,
                                    tabindex: -1,
                                }),
                                    -1 !== t &&
                                        c(this).attr({
                                            "aria-describedby":
                                                "slick-slide-control" +
                                                n.instanceUid +
                                                t,
                                        });
                            }),
                        n.$dots
                            .attr("role", "tablist")
                            .find("li")
                            .each(function (e) {
                                var t = o[e];
                                c(this).attr({ role: "presentation" }),
                                    c(this)
                                        .find("button")
                                        .first()
                                        .attr({
                                            role: "tab",
                                            id:
                                                "slick-slide-control" +
                                                n.instanceUid +
                                                e,
                                            "aria-controls":
                                                "slick-slide" +
                                                n.instanceUid +
                                                t,
                                            "aria-label": e + 1 + " of " + i,
                                            "aria-selected": null,
                                            tabindex: "-1",
                                        });
                            })
                            .eq(n.currentSlide)
                            .find("button")
                            .attr({ "aria-selected": "true", tabindex: "0" })
                            .end());
                for (
                    var e = n.currentSlide, t = e + n.options.slidesToShow;
                    e < t;
                    e++
                )
                    n.$slides.eq(e).attr("tabindex", 0);
                n.activateADA();
            }),
            (r.prototype.initArrowEvents = function () {
                var e = this;
                !0 === e.options.arrows &&
                    e.slideCount > e.options.slidesToShow &&
                    (e.$prevArrow
                        .off("click.slick")
                        .on(
                            "click.slick",
                            { message: "previous" },
                            e.changeSlide
                        ),
                    e.$nextArrow
                        .off("click.slick")
                        .on("click.slick", { message: "next" }, e.changeSlide),
                    !0 === e.options.accessibility &&
                        (e.$prevArrow.on("keydown.slick", e.keyHandler),
                        e.$nextArrow.on("keydown.slick", e.keyHandler)));
            }),
            (r.prototype.initDotEvents = function () {
                var e = this;
                !0 === e.options.dots &&
                    (c("li", e.$dots).on(
                        "click.slick",
                        { message: "index" },
                        e.changeSlide
                    ),
                    !0 === e.options.accessibility &&
                        e.$dots.on("keydown.slick", e.keyHandler)),
                    !0 === e.options.dots &&
                        !0 === e.options.pauseOnDotsHover &&
                        c("li", e.$dots)
                            .on("mouseenter.slick", c.proxy(e.interrupt, e, !0))
                            .on(
                                "mouseleave.slick",
                                c.proxy(e.interrupt, e, !1)
                            );
            }),
            (r.prototype.initSlideEvents = function () {
                var e = this;
                e.options.pauseOnHover &&
                    (e.$list.on(
                        "mouseenter.slick",
                        c.proxy(e.interrupt, e, !0)
                    ),
                    e.$list.on(
                        "mouseleave.slick",
                        c.proxy(e.interrupt, e, !1)
                    ));
            }),
            (r.prototype.initializeEvents = function () {
                var e = this;
                e.initArrowEvents(),
                    e.initDotEvents(),
                    e.initSlideEvents(),
                    e.$list.on(
                        "touchstart.slick mousedown.slick",
                        { action: "start" },
                        e.swipeHandler
                    ),
                    e.$list.on(
                        "touchmove.slick mousemove.slick",
                        { action: "move" },
                        e.swipeHandler
                    ),
                    e.$list.on(
                        "touchend.slick mouseup.slick",
                        { action: "end" },
                        e.swipeHandler
                    ),
                    e.$list.on(
                        "touchcancel.slick mouseleave.slick",
                        { action: "end" },
                        e.swipeHandler
                    ),
                    e.$list.on("click.slick", e.clickHandler),
                    c(document).on(
                        e.visibilityChange,
                        c.proxy(e.visibility, e)
                    ),
                    !0 === e.options.accessibility &&
                        e.$list.on("keydown.slick", e.keyHandler),
                    !0 === e.options.focusOnSelect &&
                        c(e.$slideTrack)
                            .children()
                            .on("click.slick", e.selectHandler),
                    c(window).on(
                        "orientationchange.slick.slick-" + e.instanceUid,
                        c.proxy(e.orientationChange, e)
                    ),
                    c(window).on(
                        "resize.slick.slick-" + e.instanceUid,
                        c.proxy(e.resize, e)
                    ),
                    c("[draggable!=true]", e.$slideTrack).on(
                        "dragstart",
                        e.preventDefault
                    ),
                    c(window).on(
                        "load.slick.slick-" + e.instanceUid,
                        e.setPosition
                    ),
                    c(e.setPosition);
            }),
            (r.prototype.initUI = function () {
                var e = this;
                !0 === e.options.arrows &&
                    e.slideCount > e.options.slidesToShow &&
                    (e.$prevArrow.show(), e.$nextArrow.show()),
                    !0 === e.options.dots &&
                        e.slideCount > e.options.slidesToShow &&
                        e.$dots.show();
            }),
            (r.prototype.keyHandler = function (e) {
                var t = this;
                e.target.tagName.match("TEXTAREA|INPUT|SELECT") ||
                    (37 === e.keyCode && !0 === t.options.accessibility
                        ? t.changeSlide({
                              data: {
                                  message:
                                      !0 === t.options.rtl
                                          ? "next"
                                          : "previous",
                              },
                          })
                        : 39 === e.keyCode &&
                          !0 === t.options.accessibility &&
                          t.changeSlide({
                              data: {
                                  message:
                                      !0 === t.options.rtl
                                          ? "previous"
                                          : "next",
                              },
                          }));
            }),
            (r.prototype.lazyLoad = function () {
                function e(e) {
                    c("img[data-lazy]", e).each(function () {
                        var e = c(this),
                            t = c(this).attr("data-lazy"),
                            n = c(this).attr("data-srcset"),
                            i =
                                c(this).attr("data-sizes") ||
                                s.$slider.attr("data-sizes"),
                            o = document.createElement("img");
                        (o.onload = function () {
                            e.animate({ opacity: 0 }, 100, function () {
                                n &&
                                    (e.attr("srcset", n),
                                    i && e.attr("sizes", i)),
                                    e
                                        .attr("src", t)
                                        .animate(
                                            { opacity: 1 },
                                            200,
                                            function () {
                                                e.removeAttr(
                                                    "data-lazy data-srcset data-sizes"
                                                ).removeClass("slick-loading");
                                            }
                                        ),
                                    s.$slider.trigger("lazyLoaded", [s, e, t]);
                            });
                        }),
                            (o.onerror = function () {
                                e
                                    .removeAttr("data-lazy")
                                    .removeClass("slick-loading")
                                    .addClass("slick-lazyload-error"),
                                    s.$slider.trigger("lazyLoadError", [
                                        s,
                                        e,
                                        t,
                                    ]);
                            }),
                            (o.src = t);
                    });
                }
                var t,
                    n,
                    i,
                    s = this;
                if (
                    (!0 === s.options.centerMode
                        ? (i =
                              !0 === s.options.infinite
                                  ? (n =
                                        s.currentSlide +
                                        (s.options.slidesToShow / 2 + 1)) +
                                    s.options.slidesToShow +
                                    2
                                  : ((n = Math.max(
                                        0,
                                        s.currentSlide -
                                            (s.options.slidesToShow / 2 + 1)
                                    )),
                                    s.options.slidesToShow / 2 +
                                        1 +
                                        2 +
                                        s.currentSlide))
                        : ((n = s.options.infinite
                              ? s.options.slidesToShow + s.currentSlide
                              : s.currentSlide),
                          (i = Math.ceil(n + s.options.slidesToShow)),
                          !0 === s.options.fade &&
                              (0 < n && n--, i <= s.slideCount && i++)),
                    (t = s.$slider.find(".slick-slide").slice(n, i)),
                    "anticipated" === s.options.lazyLoad)
                )
                    for (
                        var o = n - 1,
                            r = i,
                            a = s.$slider.find(".slick-slide"),
                            l = 0;
                        l < s.options.slidesToScroll;
                        l++
                    )
                        o < 0 && (o = s.slideCount - 1),
                            (t = (t = t.add(a.eq(o))).add(a.eq(r))),
                            o--,
                            r++;
                e(t),
                    s.slideCount <= s.options.slidesToShow
                        ? e(s.$slider.find(".slick-slide"))
                        : s.currentSlide >=
                          s.slideCount - s.options.slidesToShow
                        ? e(
                              s.$slider
                                  .find(".slick-cloned")
                                  .slice(0, s.options.slidesToShow)
                          )
                        : 0 === s.currentSlide &&
                          e(
                              s.$slider
                                  .find(".slick-cloned")
                                  .slice(-1 * s.options.slidesToShow)
                          );
            }),
            (r.prototype.loadSlider = function () {
                var e = this;
                e.setPosition(),
                    e.$slideTrack.css({ opacity: 1 }),
                    e.$slider.removeClass("slick-loading"),
                    e.initUI(),
                    "progressive" === e.options.lazyLoad &&
                        e.progressiveLazyLoad();
            }),
            (r.prototype.next = r.prototype.slickNext =
                function () {
                    this.changeSlide({ data: { message: "next" } });
                }),
            (r.prototype.orientationChange = function () {
                this.checkResponsive(), this.setPosition();
            }),
            (r.prototype.pause = r.prototype.slickPause =
                function () {
                    this.autoPlayClear(), (this.paused = !0);
                }),
            (r.prototype.play = r.prototype.slickPlay =
                function () {
                    var e = this;
                    e.autoPlay(),
                        (e.options.autoplay = !0),
                        (e.paused = !1),
                        (e.focussed = !1),
                        (e.interrupted = !1);
                }),
            (r.prototype.postSlide = function (e) {
                var t = this;
                t.unslicked ||
                    (t.$slider.trigger("afterChange", [t, e]),
                    (t.animating = !1),
                    t.slideCount > t.options.slidesToShow && t.setPosition(),
                    (t.swipeLeft = null),
                    t.options.autoplay && t.autoPlay(),
                    !0 === t.options.accessibility &&
                        (t.initADA(),
                        t.options.focusOnChange &&
                            c(t.$slides.get(t.currentSlide))
                                .attr("tabindex", 0)
                                .focus()));
            }),
            (r.prototype.prev = r.prototype.slickPrev =
                function () {
                    this.changeSlide({ data: { message: "previous" } });
                }),
            (r.prototype.preventDefault = function (e) {
                e.preventDefault();
            }),
            (r.prototype.progressiveLazyLoad = function (e) {
                e = e || 1;
                var t,
                    n,
                    i,
                    o,
                    s = this,
                    r = c("img[data-lazy]", s.$slider);
                r.length
                    ? ((t = r.first()),
                      (n = t.attr("data-lazy")),
                      (i = t.attr("data-srcset")),
                      (o =
                          t.attr("data-sizes") || s.$slider.attr("data-sizes")),
                      ((r = document.createElement("img")).onload =
                          function () {
                              i &&
                                  (t.attr("srcset", i),
                                  o && t.attr("sizes", o)),
                                  t
                                      .attr("src", n)
                                      .removeAttr(
                                          "data-lazy data-srcset data-sizes"
                                      )
                                      .removeClass("slick-loading"),
                                  !0 === s.options.adaptiveHeight &&
                                      s.setPosition(),
                                  s.$slider.trigger("lazyLoaded", [s, t, n]),
                                  s.progressiveLazyLoad();
                          }),
                      (r.onerror = function () {
                          e < 3
                              ? setTimeout(function () {
                                    s.progressiveLazyLoad(e + 1);
                                }, 500)
                              : (t
                                    .removeAttr("data-lazy")
                                    .removeClass("slick-loading")
                                    .addClass("slick-lazyload-error"),
                                s.$slider.trigger("lazyLoadError", [s, t, n]),
                                s.progressiveLazyLoad());
                      }),
                      (r.src = n))
                    : s.$slider.trigger("allImagesLoaded", [s]);
            }),
            (r.prototype.refresh = function (e) {
                var t = this,
                    n = t.slideCount - t.options.slidesToShow;
                !t.options.infinite &&
                    t.currentSlide > n &&
                    (t.currentSlide = n),
                    t.slideCount <= t.options.slidesToShow &&
                        (t.currentSlide = 0),
                    (n = t.currentSlide),
                    t.destroy(!0),
                    c.extend(t, t.initials, { currentSlide: n }),
                    t.init(),
                    e ||
                        t.changeSlide(
                            { data: { message: "index", index: n } },
                            !1
                        );
            }),
            (r.prototype.registerBreakpoints = function () {
                var e,
                    t,
                    n,
                    i = this,
                    o = i.options.responsive || null;
                if ("array" === c.type(o) && o.length) {
                    for (e in ((i.respondTo = i.options.respondTo || "window"),
                    o))
                        if (
                            ((n = i.breakpoints.length - 1),
                            o.hasOwnProperty(e))
                        ) {
                            for (t = o[e].breakpoint; 0 <= n; )
                                i.breakpoints[n] &&
                                    i.breakpoints[n] === t &&
                                    i.breakpoints.splice(n, 1),
                                    n--;
                            i.breakpoints.push(t),
                                (i.breakpointSettings[t] = o[e].settings);
                        }
                    i.breakpoints.sort(function (e, t) {
                        return i.options.mobileFirst ? e - t : t - e;
                    });
                }
            }),
            (r.prototype.reinit = function () {
                var e = this;
                (e.$slides = e.$slideTrack
                    .children(e.options.slide)
                    .addClass("slick-slide")),
                    (e.slideCount = e.$slides.length),
                    e.currentSlide >= e.slideCount &&
                        0 !== e.currentSlide &&
                        (e.currentSlide =
                            e.currentSlide - e.options.slidesToScroll),
                    e.slideCount <= e.options.slidesToShow &&
                        (e.currentSlide = 0),
                    e.registerBreakpoints(),
                    e.setProps(),
                    e.setupInfinite(),
                    e.buildArrows(),
                    e.updateArrows(),
                    e.initArrowEvents(),
                    e.buildDots(),
                    e.updateDots(),
                    e.initDotEvents(),
                    e.cleanUpSlideEvents(),
                    e.initSlideEvents(),
                    e.checkResponsive(!1, !0),
                    !0 === e.options.focusOnSelect &&
                        c(e.$slideTrack)
                            .children()
                            .on("click.slick", e.selectHandler),
                    e.setSlideClasses(
                        "number" == typeof e.currentSlide ? e.currentSlide : 0
                    ),
                    e.setPosition(),
                    e.focusHandler(),
                    (e.paused = !e.options.autoplay),
                    e.autoPlay(),
                    e.$slider.trigger("reInit", [e]);
            }),
            (r.prototype.resize = function () {
                var e = this;
                c(window).width() !== e.windowWidth &&
                    (clearTimeout(e.windowDelay),
                    (e.windowDelay = window.setTimeout(function () {
                        (e.windowWidth = c(window).width()),
                            e.checkResponsive(),
                            e.unslicked || e.setPosition();
                    }, 50)));
            }),
            (r.prototype.removeSlide = r.prototype.slickRemove =
                function (e, t, n) {
                    var i = this;
                    if (
                        ((e =
                            "boolean" == typeof e
                                ? !0 === (t = e)
                                    ? 0
                                    : i.slideCount - 1
                                : !0 === t
                                ? --e
                                : e),
                        i.slideCount < 1 || e < 0 || e > i.slideCount - 1)
                    )
                        return !1;
                    i.unload(),
                        (!0 === n
                            ? i.$slideTrack.children()
                            : i.$slideTrack.children(this.options.slide).eq(e)
                        ).remove(),
                        (i.$slides = i.$slideTrack.children(
                            this.options.slide
                        )),
                        i.$slideTrack.children(this.options.slide).detach(),
                        i.$slideTrack.append(i.$slides),
                        (i.$slidesCache = i.$slides),
                        i.reinit();
                }),
            (r.prototype.setCSS = function (e) {
                var t,
                    n,
                    i = this,
                    o = {};
                !0 === i.options.rtl && (e = -e),
                    (t =
                        "left" == i.positionProp ? Math.ceil(e) + "px" : "0px"),
                    (n = "top" == i.positionProp ? Math.ceil(e) + "px" : "0px"),
                    (o[i.positionProp] = e),
                    !1 === i.transformsEnabled ||
                        (!(o = {}) === i.cssTransitions
                            ? (o[i.animType] =
                                  "translate(" + t + ", " + n + ")")
                            : (o[i.animType] =
                                  "translate3d(" + t + ", " + n + ", 0px)")),
                    i.$slideTrack.css(o);
            }),
            (r.prototype.setDimensions = function () {
                var e = this;
                !1 === e.options.vertical
                    ? !0 === e.options.centerMode &&
                      e.$list.css({ padding: "0px " + e.options.centerPadding })
                    : (e.$list.height(
                          e.$slides.first().outerHeight(!0) *
                              e.options.slidesToShow
                      ),
                      !0 === e.options.centerMode &&
                          e.$list.css({
                              padding: e.options.centerPadding + " 0px",
                          })),
                    (e.listWidth = e.$list.width()),
                    (e.listHeight = e.$list.height()),
                    !1 === e.options.vertical && !1 === e.options.variableWidth
                        ? ((e.slideWidth = Math.ceil(
                              e.listWidth / e.options.slidesToShow
                          )),
                          e.$slideTrack.width(
                              Math.ceil(
                                  e.slideWidth *
                                      e.$slideTrack.children(".slick-slide")
                                          .length
                              )
                          ))
                        : !0 === e.options.variableWidth
                        ? e.$slideTrack.width(5e3 * e.slideCount)
                        : ((e.slideWidth = Math.ceil(e.listWidth)),
                          e.$slideTrack.height(
                              Math.ceil(
                                  e.$slides.first().outerHeight(!0) *
                                      e.$slideTrack.children(".slick-slide")
                                          .length
                              )
                          ));
                var t =
                    e.$slides.first().outerWidth(!0) -
                    e.$slides.first().width();
                !1 === e.options.variableWidth &&
                    e.$slideTrack
                        .children(".slick-slide")
                        .width(e.slideWidth - t);
            }),
            (r.prototype.setFade = function () {
                var n,
                    i = this;
                i.$slides.each(function (e, t) {
                    (n = i.slideWidth * e * -1),
                        !0 === i.options.rtl
                            ? c(t).css({
                                  position: "relative",
                                  right: n,
                                  top: 0,
                                  zIndex: i.options.zIndex - 2,
                                  opacity: 0,
                              })
                            : c(t).css({
                                  position: "relative",
                                  left: n,
                                  top: 0,
                                  zIndex: i.options.zIndex - 2,
                                  opacity: 0,
                              });
                }),
                    i.$slides
                        .eq(i.currentSlide)
                        .css({ zIndex: i.options.zIndex - 1, opacity: 1 });
            }),
            (r.prototype.setHeight = function () {
                var e,
                    t = this;
                1 === t.options.slidesToShow &&
                    !0 === t.options.adaptiveHeight &&
                    !1 === t.options.vertical &&
                    ((e = t.$slides.eq(t.currentSlide).outerHeight(!0)),
                    t.$list.css("height", e));
            }),
            (r.prototype.setOption = r.prototype.slickSetOption =
                function () {
                    var e,
                        t,
                        n,
                        i,
                        o,
                        s = this,
                        r = !1;
                    if (
                        ("object" === c.type(arguments[0])
                            ? ((n = arguments[0]),
                              (r = arguments[1]),
                              (o = "multiple"))
                            : "string" === c.type(arguments[0]) &&
                              ((n = arguments[0]),
                              (i = arguments[1]),
                              (r = arguments[2]),
                              "responsive" === arguments[0] &&
                              "array" === c.type(arguments[1])
                                  ? (o = "responsive")
                                  : void 0 !== arguments[1] && (o = "single")),
                        "single" === o)
                    )
                        s.options[n] = i;
                    else if ("multiple" === o)
                        c.each(n, function (e, t) {
                            s.options[e] = t;
                        });
                    else if ("responsive" === o)
                        for (t in i)
                            if ("array" !== c.type(s.options.responsive))
                                s.options.responsive = [i[t]];
                            else {
                                for (
                                    e = s.options.responsive.length - 1;
                                    0 <= e;

                                )
                                    s.options.responsive[e].breakpoint ===
                                        i[t].breakpoint &&
                                        s.options.responsive.splice(e, 1),
                                        e--;
                                s.options.responsive.push(i[t]);
                            }
                    r && (s.unload(), s.reinit());
                }),
            (r.prototype.setPosition = function () {
                var e = this;
                e.setDimensions(),
                    e.setHeight(),
                    !1 === e.options.fade
                        ? e.setCSS(e.getLeft(e.currentSlide))
                        : e.setFade(),
                    e.$slider.trigger("setPosition", [e]);
            }),
            (r.prototype.setProps = function () {
                var e = this,
                    t = document.body.style;
                (e.positionProp = !0 === e.options.vertical ? "top" : "left"),
                    "top" === e.positionProp
                        ? e.$slider.addClass("slick-vertical")
                        : e.$slider.removeClass("slick-vertical"),
                    (void 0 === t.WebkitTransition &&
                        void 0 === t.MozTransition &&
                        void 0 === t.msTransition) ||
                        (!0 === e.options.useCSS && (e.cssTransitions = !0)),
                    e.options.fade &&
                        ("number" == typeof e.options.zIndex
                            ? e.options.zIndex < 3 && (e.options.zIndex = 3)
                            : (e.options.zIndex = e.defaults.zIndex)),
                    void 0 !== t.OTransform &&
                        ((e.animType = "OTransform"),
                        (e.transformType = "-o-transform"),
                        (e.transitionType = "OTransition"),
                        void 0 === t.perspectiveProperty &&
                            void 0 === t.webkitPerspective &&
                            (e.animType = !1)),
                    void 0 !== t.MozTransform &&
                        ((e.animType = "MozTransform"),
                        (e.transformType = "-moz-transform"),
                        (e.transitionType = "MozTransition"),
                        void 0 === t.perspectiveProperty &&
                            void 0 === t.MozPerspective &&
                            (e.animType = !1)),
                    void 0 !== t.webkitTransform &&
                        ((e.animType = "webkitTransform"),
                        (e.transformType = "-webkit-transform"),
                        (e.transitionType = "webkitTransition"),
                        void 0 === t.perspectiveProperty &&
                            void 0 === t.webkitPerspective &&
                            (e.animType = !1)),
                    void 0 !== t.msTransform &&
                        ((e.animType = "msTransform"),
                        (e.transformType = "-ms-transform"),
                        (e.transitionType = "msTransition"),
                        void 0 === t.msTransform && (e.animType = !1)),
                    void 0 !== t.transform &&
                        !1 !== e.animType &&
                        ((e.animType = "transform"),
                        (e.transformType = "transform"),
                        (e.transitionType = "transition")),
                    (e.transformsEnabled =
                        e.options.useTransform &&
                        null !== e.animType &&
                        !1 !== e.animType);
            }),
            (r.prototype.setSlideClasses = function (e) {
                var t,
                    n,
                    i,
                    o = this,
                    s = o.$slider
                        .find(".slick-slide")
                        .removeClass("slick-active slick-center slick-current")
                        .attr("aria-hidden", "true");
                o.$slides.eq(e).addClass("slick-current"),
                    !0 === o.options.centerMode
                        ? ((n = o.options.slidesToShow % 2 == 0 ? 1 : 0),
                          (i = Math.floor(o.options.slidesToShow / 2)),
                          !0 === o.options.infinite &&
                              (i <= e && e <= o.slideCount - 1 - i
                                  ? o.$slides
                                        .slice(e - i + n, e + i + 1)
                                        .addClass("slick-active")
                                        .attr("aria-hidden", "false")
                                  : ((t = o.options.slidesToShow + e),
                                    s
                                        .slice(t - i + 1 + n, t + i + 2)
                                        .addClass("slick-active")
                                        .attr("aria-hidden", "false")),
                              0 === e
                                  ? s
                                        .eq(
                                            s.length -
                                                1 -
                                                o.options.slidesToShow
                                        )
                                        .addClass("slick-center")
                                  : e === o.slideCount - 1 &&
                                    s
                                        .eq(o.options.slidesToShow)
                                        .addClass("slick-center")),
                          o.$slides.eq(e).addClass("slick-center"))
                        : 0 <= e && e <= o.slideCount - o.options.slidesToShow
                        ? o.$slides
                              .slice(e, e + o.options.slidesToShow)
                              .addClass("slick-active")
                              .attr("aria-hidden", "false")
                        : s.length <= o.options.slidesToShow
                        ? s
                              .addClass("slick-active")
                              .attr("aria-hidden", "false")
                        : ((i = o.slideCount % o.options.slidesToShow),
                          (t =
                              !0 === o.options.infinite
                                  ? o.options.slidesToShow + e
                                  : e),
                          (o.options.slidesToShow == o.options.slidesToScroll &&
                          o.slideCount - e < o.options.slidesToShow
                              ? s.slice(t - (o.options.slidesToShow - i), t + i)
                              : s.slice(t, t + o.options.slidesToShow)
                          )
                              .addClass("slick-active")
                              .attr("aria-hidden", "false")),
                    ("ondemand" !== o.options.lazyLoad &&
                        "anticipated" !== o.options.lazyLoad) ||
                        o.lazyLoad();
            }),
            (r.prototype.setupInfinite = function () {
                var e,
                    t,
                    n,
                    i = this;
                if (
                    (!0 === i.options.fade && (i.options.centerMode = !1),
                    !0 === i.options.infinite &&
                        !1 === i.options.fade &&
                        ((t = null), i.slideCount > i.options.slidesToShow))
                ) {
                    for (
                        n =
                            !0 === i.options.centerMode
                                ? i.options.slidesToShow + 1
                                : i.options.slidesToShow,
                            e = i.slideCount;
                        e > i.slideCount - n;
                        --e
                    )
                        c(i.$slides[(t = e - 1)])
                            .clone(!0)
                            .attr("id", "")
                            .attr("data-slick-index", t - i.slideCount)
                            .prependTo(i.$slideTrack)
                            .addClass("slick-cloned");
                    for (e = 0; e < n + i.slideCount; e += 1)
                        c(i.$slides[(t = e)])
                            .clone(!0)
                            .attr("id", "")
                            .attr("data-slick-index", t + i.slideCount)
                            .appendTo(i.$slideTrack)
                            .addClass("slick-cloned");
                    i.$slideTrack
                        .find(".slick-cloned")
                        .find("[id]")
                        .each(function () {
                            c(this).attr("id", "");
                        });
                }
            }),
            (r.prototype.interrupt = function (e) {
                e || this.autoPlay(), (this.interrupted = e);
            }),
            (r.prototype.selectHandler = function (e) {
                (e = c(e.target).is(".slick-slide")
                    ? c(e.target)
                    : c(e.target).parents(".slick-slide")),
                    (e = (e = parseInt(e.attr("data-slick-index"))) || 0);
                this.slideCount <= this.options.slidesToShow
                    ? this.slideHandler(e, !1, !0)
                    : this.slideHandler(e);
            }),
            (r.prototype.slideHandler = function (e, t, n) {
                var i,
                    o,
                    s,
                    r,
                    a = this;
                if (
                    ((t = t || !1),
                    !(
                        (!0 === a.animating &&
                            !0 === a.options.waitForAnimate) ||
                        (!0 === a.options.fade && a.currentSlide === e)
                    ))
                )
                    if (
                        (!1 === t && a.asNavFor(e),
                        (r = a.getLeft((i = e))),
                        (t = a.getLeft(a.currentSlide)),
                        (a.currentLeft =
                            null === a.swipeLeft ? t : a.swipeLeft),
                        !1 === a.options.infinite &&
                            !1 === a.options.centerMode &&
                            (e < 0 ||
                                e > a.getDotCount() * a.options.slidesToScroll))
                    )
                        !1 === a.options.fade &&
                            ((i = a.currentSlide),
                            !0 !== n
                                ? a.animateSlide(t, function () {
                                      a.postSlide(i);
                                  })
                                : a.postSlide(i));
                    else if (
                        !1 === a.options.infinite &&
                        !0 === a.options.centerMode &&
                        (e < 0 || e > a.slideCount - a.options.slidesToScroll)
                    )
                        !1 === a.options.fade &&
                            ((i = a.currentSlide),
                            !0 !== n
                                ? a.animateSlide(t, function () {
                                      a.postSlide(i);
                                  })
                                : a.postSlide(i));
                    else {
                        if (
                            (a.options.autoplay &&
                                clearInterval(a.autoPlayTimer),
                            (o =
                                i < 0
                                    ? a.slideCount % a.options.slidesToScroll !=
                                      0
                                        ? a.slideCount -
                                          (a.slideCount %
                                              a.options.slidesToScroll)
                                        : a.slideCount + i
                                    : i >= a.slideCount
                                    ? a.slideCount % a.options.slidesToScroll !=
                                      0
                                        ? 0
                                        : i - a.slideCount
                                    : i),
                            (a.animating = !0),
                            a.$slider.trigger("beforeChange", [
                                a,
                                a.currentSlide,
                                o,
                            ]),
                            (t = a.currentSlide),
                            (a.currentSlide = o),
                            a.setSlideClasses(a.currentSlide),
                            a.options.asNavFor &&
                                (s = (s = a.getNavTarget()).slick("getSlick"))
                                    .slideCount <= s.options.slidesToShow &&
                                s.setSlideClasses(a.currentSlide),
                            a.updateDots(),
                            a.updateArrows(),
                            !0 === a.options.fade)
                        )
                            return (
                                !0 !== n
                                    ? (a.fadeSlideOut(t),
                                      a.fadeSlide(o, function () {
                                          a.postSlide(o);
                                      }))
                                    : a.postSlide(o),
                                void a.animateHeight()
                            );
                        !0 !== n
                            ? a.animateSlide(r, function () {
                                  a.postSlide(o);
                              })
                            : a.postSlide(o);
                    }
            }),
            (r.prototype.startLoad = function () {
                var e = this;
                !0 === e.options.arrows &&
                    e.slideCount > e.options.slidesToShow &&
                    (e.$prevArrow.hide(), e.$nextArrow.hide()),
                    !0 === e.options.dots &&
                        e.slideCount > e.options.slidesToShow &&
                        e.$dots.hide(),
                    e.$slider.addClass("slick-loading");
            }),
            (r.prototype.swipeDirection = function () {
                var e = this,
                    t = e.touchObject.startX - e.touchObject.curX,
                    n = e.touchObject.startY - e.touchObject.curY,
                    t = Math.atan2(n, t);
                return ((t =
                    (t = Math.round((180 * t) / Math.PI)) < 0
                        ? 360 - Math.abs(t)
                        : t) <= 45 &&
                    0 <= t) ||
                    (t <= 360 && 315 <= t)
                    ? !1 === e.options.rtl
                        ? "left"
                        : "right"
                    : 135 <= t && t <= 225
                    ? !1 === e.options.rtl
                        ? "right"
                        : "left"
                    : !0 === e.options.verticalSwiping
                    ? 35 <= t && t <= 135
                        ? "down"
                        : "up"
                    : "vertical";
            }),
            (r.prototype.swipeEnd = function (e) {
                var t,
                    n,
                    i = this;
                if (((i.dragging = !1), (i.swiping = !1), i.scrolling))
                    return (i.scrolling = !1);
                if (
                    ((i.interrupted = !1),
                    (i.shouldClick = !(10 < i.touchObject.swipeLength)),
                    void 0 === i.touchObject.curX)
                )
                    return !1;
                if (
                    (!0 === i.touchObject.edgeHit &&
                        i.$slider.trigger("edge", [i, i.swipeDirection()]),
                    i.touchObject.swipeLength >= i.touchObject.minSwipe)
                ) {
                    switch ((n = i.swipeDirection())) {
                        case "left":
                        case "down":
                            (t = i.options.swipeToSlide
                                ? i.checkNavigable(
                                      i.currentSlide + i.getSlideCount()
                                  )
                                : i.currentSlide + i.getSlideCount()),
                                (i.currentDirection = 0);
                            break;
                        case "right":
                        case "up":
                            (t = i.options.swipeToSlide
                                ? i.checkNavigable(
                                      i.currentSlide - i.getSlideCount()
                                  )
                                : i.currentSlide - i.getSlideCount()),
                                (i.currentDirection = 1);
                    }
                    "vertical" != n &&
                        (i.slideHandler(t),
                        (i.touchObject = {}),
                        i.$slider.trigger("swipe", [i, n]));
                } else
                    i.touchObject.startX !== i.touchObject.curX &&
                        (i.slideHandler(i.currentSlide), (i.touchObject = {}));
            }),
            (r.prototype.swipeHandler = function (e) {
                var t = this;
                if (
                    !(
                        !1 === t.options.swipe ||
                        ("ontouchend" in document && !1 === t.options.swipe) ||
                        (!1 === t.options.draggable &&
                            -1 !== e.type.indexOf("mouse"))
                    )
                )
                    switch (
                        ((t.touchObject.fingerCount =
                            e.originalEvent &&
                            void 0 !== e.originalEvent.touches
                                ? e.originalEvent.touches.length
                                : 1),
                        (t.touchObject.minSwipe =
                            t.listWidth / t.options.touchThreshold),
                        !0 === t.options.verticalSwiping &&
                            (t.touchObject.minSwipe =
                                t.listHeight / t.options.touchThreshold),
                        e.data.action)
                    ) {
                        case "start":
                            t.swipeStart(e);
                            break;
                        case "move":
                            t.swipeMove(e);
                            break;
                        case "end":
                            t.swipeEnd(e);
                    }
            }),
            (r.prototype.swipeMove = function (e) {
                var t,
                    n,
                    i = this,
                    o =
                        void 0 !== e.originalEvent
                            ? e.originalEvent.touches
                            : null;
                return (
                    !(!i.dragging || i.scrolling || (o && 1 !== o.length)) &&
                    ((t = i.getLeft(i.currentSlide)),
                    (i.touchObject.curX =
                        void 0 !== o ? o[0].pageX : e.clientX),
                    (i.touchObject.curY =
                        void 0 !== o ? o[0].pageY : e.clientY),
                    (i.touchObject.swipeLength = Math.round(
                        Math.sqrt(
                            Math.pow(
                                i.touchObject.curX - i.touchObject.startX,
                                2
                            )
                        )
                    )),
                    (n = Math.round(
                        Math.sqrt(
                            Math.pow(
                                i.touchObject.curY - i.touchObject.startY,
                                2
                            )
                        )
                    )),
                    !i.options.verticalSwiping && !i.swiping && 4 < n
                        ? !(i.scrolling = !0)
                        : (!0 === i.options.verticalSwiping &&
                              (i.touchObject.swipeLength = n),
                          (o = i.swipeDirection()),
                          void 0 !== e.originalEvent &&
                              4 < i.touchObject.swipeLength &&
                              ((i.swiping = !0), e.preventDefault()),
                          (n =
                              (!1 === i.options.rtl ? 1 : -1) *
                              (i.touchObject.curX > i.touchObject.startX
                                  ? 1
                                  : -1)),
                          !0 === i.options.verticalSwiping &&
                              (n =
                                  i.touchObject.curY > i.touchObject.startY
                                      ? 1
                                      : -1),
                          (e = i.touchObject.swipeLength),
                          (i.touchObject.edgeHit = !1) === i.options.infinite &&
                              ((0 === i.currentSlide && "right" === o) ||
                                  (i.currentSlide >= i.getDotCount() &&
                                      "left" === o)) &&
                              ((e =
                                  i.touchObject.swipeLength *
                                  i.options.edgeFriction),
                              (i.touchObject.edgeHit = !0)),
                          !1 === i.options.vertical
                              ? (i.swipeLeft = t + e * n)
                              : (i.swipeLeft =
                                    t +
                                    e * (i.$list.height() / i.listWidth) * n),
                          !0 === i.options.verticalSwiping &&
                              (i.swipeLeft = t + e * n),
                          !0 !== i.options.fade &&
                              !1 !== i.options.touchMove &&
                              (!0 === i.animating
                                  ? ((i.swipeLeft = null), !1)
                                  : void i.setCSS(i.swipeLeft))))
                );
            }),
            (r.prototype.swipeStart = function (e) {
                var t,
                    n = this;
                if (
                    ((n.interrupted = !0),
                    1 !== n.touchObject.fingerCount ||
                        n.slideCount <= n.options.slidesToShow)
                )
                    return !(n.touchObject = {});
                void 0 !== e.originalEvent &&
                    void 0 !== e.originalEvent.touches &&
                    (t = e.originalEvent.touches[0]),
                    (n.touchObject.startX = n.touchObject.curX =
                        void 0 !== t ? t.pageX : e.clientX),
                    (n.touchObject.startY = n.touchObject.curY =
                        void 0 !== t ? t.pageY : e.clientY),
                    (n.dragging = !0);
            }),
            (r.prototype.unfilterSlides = r.prototype.slickUnfilter =
                function () {
                    var e = this;
                    null !== e.$slidesCache &&
                        (e.unload(),
                        e.$slideTrack.children(this.options.slide).detach(),
                        e.$slidesCache.appendTo(e.$slideTrack),
                        e.reinit());
                }),
            (r.prototype.unload = function () {
                var e = this;
                c(".slick-cloned", e.$slider).remove(),
                    e.$dots && e.$dots.remove(),
                    e.$prevArrow &&
                        e.htmlExpr.test(e.options.prevArrow) &&
                        e.$prevArrow.remove(),
                    e.$nextArrow &&
                        e.htmlExpr.test(e.options.nextArrow) &&
                        e.$nextArrow.remove(),
                    e.$slides
                        .removeClass(
                            "slick-slide slick-active slick-visible slick-current"
                        )
                        .attr("aria-hidden", "true")
                        .css("width", "");
            }),
            (r.prototype.unslick = function (e) {
                this.$slider.trigger("unslick", [this, e]), this.destroy();
            }),
            (r.prototype.updateArrows = function () {
                var e = this;
                Math.floor(e.options.slidesToShow / 2),
                    !0 === e.options.arrows &&
                        e.slideCount > e.options.slidesToShow &&
                        !e.options.infinite &&
                        (e.$prevArrow
                            .removeClass("slick-disabled")
                            .attr("aria-disabled", "false"),
                        e.$nextArrow
                            .removeClass("slick-disabled")
                            .attr("aria-disabled", "false"),
                        0 === e.currentSlide
                            ? (e.$prevArrow
                                  .addClass("slick-disabled")
                                  .attr("aria-disabled", "true"),
                              e.$nextArrow
                                  .removeClass("slick-disabled")
                                  .attr("aria-disabled", "false"))
                            : ((e.currentSlide >=
                                  e.slideCount - e.options.slidesToShow &&
                                  !1 === e.options.centerMode) ||
                                  (e.currentSlide >= e.slideCount - 1 &&
                                      !0 === e.options.centerMode)) &&
                              (e.$nextArrow
                                  .addClass("slick-disabled")
                                  .attr("aria-disabled", "true"),
                              e.$prevArrow
                                  .removeClass("slick-disabled")
                                  .attr("aria-disabled", "false")));
            }),
            (r.prototype.updateDots = function () {
                var e = this;
                null !== e.$dots &&
                    (e.$dots.find("li").removeClass("slick-active").end(),
                    e.$dots
                        .find("li")
                        .eq(
                            Math.floor(
                                e.currentSlide / e.options.slidesToScroll
                            )
                        )
                        .addClass("slick-active"));
            }),
            (r.prototype.visibility = function () {
                this.options.autoplay &&
                    (document[this.hidden]
                        ? (this.interrupted = !0)
                        : (this.interrupted = !1));
            }),
            (c.fn.slick = function () {
                for (
                    var e,
                        t = this,
                        n = arguments[0],
                        i = Array.prototype.slice.call(arguments, 1),
                        o = t.length,
                        s = 0;
                    s < o;
                    s++
                )
                    if (
                        ("object" == typeof n || void 0 === n
                            ? (t[s].slick = new r(t[s], n))
                            : (e = t[s].slick[n].apply(t[s].slick, i)),
                        void 0 !== e)
                    )
                        return e;
                return t;
            });
    }),
    (function (s) {
        "use strict";
        var p = {
            cache: {},
            support: {},
            objects: {},
            init: function (t) {
                return this.each(function () {
                    s(this)
                        .unbind("click.lightcase")
                        .bind("click.lightcase", function (e) {
                            e.preventDefault(), s(this).lightcase("start", t);
                        });
                });
            },
            start: function (e) {
                (p.origin = lightcase.origin = this),
                    (p.settings = lightcase.settings =
                        s.extend(
                            !0,
                            {
                                idPrefix: "lightcase-",
                                classPrefix: "lightcase-",
                                attrPrefix: "lc-",
                                transition: "elastic",
                                transitionIn: null,
                                transitionOut: null,
                                cssTransitions: !0,
                                speedIn: 250,
                                speedOut: 250,
                                maxWidth: 800,
                                maxHeight: 500,
                                forceWidth: !1,
                                forceHeight: !1,
                                liveResize: !0,
                                fullScreenModeForMobile: !0,
                                mobileMatchExpression:
                                    /(iphone|ipod|ipad|android|blackberry|symbian)/,
                                disableShrink: !1,
                                shrinkFactor: 0.75,
                                overlayOpacity: 0.9,
                                slideshow: !1,
                                timeout: 5e3,
                                swipe: !0,
                                useKeys: !0,
                                useCategories: !0,
                                navigateEndless: !0,
                                closeOnOverlayClick: !0,
                                title: null,
                                caption: null,
                                showTitle: !0,
                                showCaption: !0,
                                showSequenceInfo: !0,
                                inline: { width: "auto", height: "auto" },
                                ajax: {
                                    width: "auto",
                                    height: "auto",
                                    type: "get",
                                    dataType: "html",
                                    data: {},
                                },
                                iframe: {
                                    width: 800,
                                    height: 500,
                                    frameborder: 0,
                                },
                                flash: {
                                    width: 400,
                                    height: 205,
                                    wmode: "transparent",
                                },
                                video: {
                                    width: 400,
                                    height: 225,
                                    poster: "",
                                    preload: "auto",
                                    controls: !0,
                                    autobuffer: !0,
                                    autoplay: !0,
                                    loop: !1,
                                },
                                attr: "data-rel",
                                href: null,
                                type: null,
                                typeMapping: {
                                    image: "jpg,jpeg,gif,png,bmp",
                                    flash: "swf",
                                    video: "mp4,mov,ogv,ogg,webm",
                                    iframe: "html,php",
                                    ajax: "json,txt",
                                    inline: "#",
                                },
                                errorMessage: function () {
                                    return (
                                        '<p class="' +
                                        p.settings.classPrefix +
                                        'error">' +
                                        p.settings.labels.errorMessage +
                                        "</p>"
                                    );
                                },
                                labels: {
                                    errorMessage:
                                        "Source could not be found...",
                                    "sequenceInfo.of": " of ",
                                    close: "Close",
                                    "navigator.prev": "Prev",
                                    "navigator.next": "Next",
                                    "navigator.play": "Play",
                                    "navigator.pause": "Pause",
                                },
                                markup: function () {
                                    s("body").append(
                                        (p.objects.overlay = s(
                                            '<div id="' +
                                                p.settings.idPrefix +
                                                'overlay"></div>'
                                        )),
                                        (p.objects.loading = s(
                                            '<div id="' +
                                                p.settings.idPrefix +
                                                'loading" class="' +
                                                p.settings.classPrefix +
                                                'icon-spin"></div>'
                                        )),
                                        (p.objects.case = s(
                                            '<div id="' +
                                                p.settings.idPrefix +
                                                'case" aria-hidden="true" role="dialog"></div>'
                                        ))
                                    ),
                                        p.objects.case.after(
                                            (p.objects.nav = s(
                                                '<div id="' +
                                                    p.settings.idPrefix +
                                                    'nav"></div>'
                                            ))
                                        ),
                                        p.objects.nav.append(
                                            (p.objects.close = s(
                                                '<a href="#" class="' +
                                                    p.settings.classPrefix +
                                                    'icon-close"><span>' +
                                                    p.settings.labels.close +
                                                    "</span></a>"
                                            )),
                                            (p.objects.prev = s(
                                                '<a href="#" class="' +
                                                    p.settings.classPrefix +
                                                    'icon-prev"><span>' +
                                                    p.settings.labels[
                                                        "navigator.prev"
                                                    ] +
                                                    "</span></a>"
                                            ).hide()),
                                            (p.objects.next = s(
                                                '<a href="#" class="' +
                                                    p.settings.classPrefix +
                                                    'icon-next"><span>' +
                                                    p.settings.labels[
                                                        "navigator.next"
                                                    ] +
                                                    "</span></a>"
                                            ).hide()),
                                            (p.objects.play = s(
                                                '<a href="#" class="' +
                                                    p.settings.classPrefix +
                                                    'icon-play"><span>' +
                                                    p.settings.labels[
                                                        "navigator.play"
                                                    ] +
                                                    "</span></a>"
                                            ).hide()),
                                            (p.objects.pause = s(
                                                '<a href="#" class="' +
                                                    p.settings.classPrefix +
                                                    'icon-pause"><span>' +
                                                    p.settings.labels[
                                                        "navigator.pause"
                                                    ] +
                                                    "</span></a>"
                                            ).hide())
                                        ),
                                        p.objects.case.append(
                                            (p.objects.content = s(
                                                '<div id="' +
                                                    p.settings.idPrefix +
                                                    'content"></div>'
                                            )),
                                            (p.objects.info = s(
                                                '<div id="' +
                                                    p.settings.idPrefix +
                                                    'info"></div>'
                                            ))
                                        ),
                                        p.objects.content.append(
                                            (p.objects.contentInner = s(
                                                '<div class="' +
                                                    p.settings.classPrefix +
                                                    'contentInner"></div>'
                                            ))
                                        ),
                                        p.objects.info.append(
                                            (p.objects.sequenceInfo = s(
                                                '<div id="' +
                                                    p.settings.idPrefix +
                                                    'sequenceInfo"></div>'
                                            )),
                                            (p.objects.title = s(
                                                '<h4 id="' +
                                                    p.settings.idPrefix +
                                                    'title"></h4>'
                                            )),
                                            (p.objects.caption = s(
                                                '<p id="' +
                                                    p.settings.idPrefix +
                                                    'caption"></p>'
                                            ))
                                        );
                                },
                                onInit: {},
                                onStart: {},
                                onFinish: {},
                                onClose: {},
                                onCleanup: {},
                            },
                            e
                        )),
                    p._callHooks(p.settings.onInit),
                    (p.objectData = p._setObjectData(this)),
                    p._cacheScrollPosition(),
                    p._watchScrollInteraction(),
                    p._addElements(),
                    p._open(),
                    (p.dimensions = p.getViewportDimensions());
            },
            get: function (e) {
                return p.objects[e];
            },
            getObjectData: function () {
                return p.objectData;
            },
            _setObjectData: function (e) {
                (e = s(e)),
                    (e = {
                        title:
                            p.settings.title ||
                            e.attr(p._prefixAttributeName("title")) ||
                            e.attr("title"),
                        caption:
                            p.settings.caption ||
                            e.attr(p._prefixAttributeName("caption")) ||
                            e.children("img").attr("alt"),
                        url: p._determineUrl(),
                        requestType: p.settings.ajax.type,
                        requestData: p.settings.ajax.data,
                        requestDataType: p.settings.ajax.dataType,
                        rel: e.attr(p._determineAttributeSelector()),
                        type:
                            p.settings.type ||
                            p._verifyDataType(p._determineUrl()),
                        isPartOfSequence: p._isPartOfSequence(
                            e.attr(p.settings.attr),
                            ":"
                        ),
                        isPartOfSequenceWithSlideshow: p._isPartOfSequence(
                            e.attr(p.settings.attr),
                            ":slideshow"
                        ),
                        currentIndex: s(p._determineAttributeSelector()).index(
                            e
                        ),
                        sequenceLength: s(p._determineAttributeSelector())
                            .length,
                    });
                return (
                    (e.sequenceInfo =
                        e.currentIndex +
                        1 +
                        p.settings.labels["sequenceInfo.of"] +
                        e.sequenceLength),
                    (e.prevIndex = e.currentIndex - 1),
                    (e.nextIndex = e.currentIndex + 1),
                    e
                );
            },
            _prefixAttributeName: function (e) {
                return "data-" + p.settings.attrPrefix + e;
            },
            _determineLinkTarget: function () {
                return (
                    p.settings.href ||
                    s(p.origin).attr(p._prefixAttributeName("href")) ||
                    s(p.origin).attr("href")
                );
            },
            _determineAttributeSelector: function () {
                var e,
                    t = s(p.origin),
                    n = "";
                return (
                    void 0 !== p.cache.selector
                        ? (n = p.cache.selector)
                        : !0 === p.settings.useCategories &&
                          t.attr(p._prefixAttributeName("categories"))
                        ? ((e = t
                              .attr(p._prefixAttributeName("categories"))
                              .split(" ")),
                          s.each(e, function (e, t) {
                              0 < e && (n += ","),
                                  (n +=
                                      "[" +
                                      p._prefixAttributeName("categories") +
                                      '~="' +
                                      t +
                                      '"]');
                          }))
                        : (n =
                              "[" +
                              p.settings.attr +
                              '="' +
                              t.attr(p.settings.attr) +
                              '"]'),
                    (p.cache.selector = n)
                );
            },
            _determineUrl: function () {
                var n,
                    e = p._verifyDataUrl(p._determineLinkTarget()),
                    i = 0,
                    o = 0;
                return (
                    s.each(e, function (e, t) {
                        p._devicePixelRatio() >= t.density &&
                            t.density >= o &&
                            p._matchMedia()(
                                "screen and (min-width:" + t.width + "px)"
                            ) &&
                            t.width >= i &&
                            ((i = t.width), (o = t.density), (n = t.url));
                    }),
                    n
                );
            },
            _normalizeUrl: function (e) {
                var s = /^\d+$/;
                return e.split(",").map(function (e) {
                    var o = { width: 0, density: 0 };
                    return (
                        e
                            .trim()
                            .split(/\s+/)
                            .forEach(function (e, t) {
                                if (0 === t) return (o.url = e);
                                var n = e.substring(0, e.length - 1),
                                    i = e[e.length - 1],
                                    t = parseInt(n, 10),
                                    e = parseFloat(n);
                                "w" === i && s.test(n)
                                    ? (o.width = t)
                                    : "h" === i && s.test(n)
                                    ? (o.height = t)
                                    : "x" !== i || isNaN(e) || (o.density = e);
                            }),
                        o
                    );
                });
            },
            _isPartOfSequence: function (e, t) {
                var n = s("[" + p.settings.attr + '="' + e + '"]');
                return new RegExp(t).test(e) && 1 < n.length;
            },
            isSlideshowEnabled: function () {
                return (
                    p.objectData.isPartOfSequence &&
                    (!0 === p.settings.slideshow ||
                        !0 === p.objectData.isPartOfSequenceWithSlideshow)
                );
            },
            _loadContent: function () {
                p.cache.originalObject && p._restoreObject(), p._createObject();
            },
            _createObject: function () {
                var n;
                switch (p.objectData.type) {
                    case "image":
                        (n = s(new Image())).attr({
                            src: p.objectData.url,
                            alt: p.objectData.title,
                        });
                        break;
                    case "inline":
                        (n = s(
                            '<div class="' +
                                p.settings.classPrefix +
                                'inlineWrap"></div>'
                        )).html(p._cloneObject(s(p.objectData.url))),
                            s.each(p.settings.inline, function (e, t) {
                                n.attr(p._prefixAttributeName(e), t);
                            });
                        break;
                    case "ajax":
                        (n = s(
                            '<div class="' +
                                p.settings.classPrefix +
                                'inlineWrap"></div>'
                        )),
                            s.each(p.settings.ajax, function (e, t) {
                                "data" !== e &&
                                    n.attr(p._prefixAttributeName(e), t);
                            });
                        break;
                    case "flash":
                        (n = s(
                            '<embed src="' +
                                p.objectData.url +
                                '" type="application/x-shockwave-flash"></embed>'
                        )),
                            s.each(p.settings.flash, function (e, t) {
                                n.attr(e, t);
                            });
                        break;
                    case "video":
                        (n = s("<video></video>")).attr(
                            "src",
                            p.objectData.url
                        ),
                            s.each(p.settings.video, function (e, t) {
                                n.attr(e, t);
                            });
                        break;
                    default:
                        (n = s("<iframe></iframe>")).attr({
                            src: p.objectData.url,
                        }),
                            s.each(p.settings.iframe, function (e, t) {
                                n.attr(e, t);
                            });
                }
                p._addObject(n), p._loadObject(n);
            },
            _addObject: function (e) {
                p.objects.contentInner.html(e),
                    p._loading("start"),
                    p._callHooks(p.settings.onStart),
                    !0 === p.settings.showSequenceInfo &&
                    p.objectData.isPartOfSequence
                        ? (p.objects.sequenceInfo.html(
                              p.objectData.sequenceInfo
                          ),
                          p.objects.sequenceInfo.show())
                        : (p.objects.sequenceInfo.empty(),
                          p.objects.sequenceInfo.hide()),
                    !0 === p.settings.showTitle &&
                    void 0 !== p.objectData.title &&
                    "" !== p.objectData.title
                        ? (p.objects.title.html(p.objectData.title),
                          p.objects.title.show())
                        : (p.objects.title.empty(), p.objects.title.hide()),
                    !0 === p.settings.showCaption &&
                    void 0 !== p.objectData.caption &&
                    "" !== p.objectData.caption
                        ? (p.objects.caption.html(p.objectData.caption),
                          p.objects.caption.show())
                        : (p.objects.caption.empty(), p.objects.caption.hide());
            },
            _loadObject: function (i) {
                switch (p.objectData.type) {
                    case "inline":
                        s(p.objectData.url) ? p._showContent(i) : p.error();
                        break;
                    case "ajax":
                        s.ajax(
                            s.extend({}, p.settings.ajax, {
                                url: p.objectData.url,
                                type: p.objectData.requestType,
                                dataType: p.objectData.requestDataType,
                                data: p.objectData.requestData,
                                success: function (e, t, n) {
                                    "json" === p.objectData.requestDataType
                                        ? (p.objectData.data = e)
                                        : i.html(e),
                                        p._showContent(i);
                                },
                                error: function (e, t, n) {
                                    p.error();
                                },
                            })
                        );
                        break;
                    case "flash":
                        p._showContent(i);
                        break;
                    case "video":
                        "function" == typeof i.get(0).canPlayType ||
                        0 === p.objects.case.find("video").length
                            ? p._showContent(i)
                            : p.error();
                        break;
                    default:
                        p.objectData.url
                            ? (i.load(function () {
                                  p._showContent(i);
                              }),
                              i.error(function () {
                                  p.error();
                              }))
                            : p.error();
                }
            },
            error: function () {
                p.objectData.type = "error";
                var e = s(
                    '<div class="' +
                        p.settings.classPrefix +
                        'inlineWrap"></div>'
                );
                e.html(p.settings.errorMessage),
                    p.objects.contentInner.html(e),
                    p._showContent(p.objects.contentInner);
            },
            _calculateDimensions: function (e) {
                p._cleanupDimensions();
                var t = {
                    objectWidth: e.attr("width")
                        ? e.attr("width")
                        : e.attr(p._prefixAttributeName("width")),
                    objectHeight: e.attr("height")
                        ? e.attr("height")
                        : e.attr(p._prefixAttributeName("height")),
                };
                if (!p.settings.disableShrink)
                    switch (
                        ((t.maxWidth = parseInt(
                            p.dimensions.windowWidth * p.settings.shrinkFactor
                        )),
                        (t.maxHeight = parseInt(
                            p.dimensions.windowHeight * p.settings.shrinkFactor
                        )),
                        t.maxWidth > p.settings.maxWidth &&
                            (t.maxWidth = p.settings.maxWidth),
                        t.maxHeight > p.settings.maxHeight &&
                            (t.maxHeight = p.settings.maxHeight),
                        (t.differenceWidthAsPercent = parseInt(
                            (100 / t.maxWidth) * t.objectWidth
                        )),
                        (t.differenceHeightAsPercent = parseInt(
                            (100 / t.maxHeight) * t.objectHeight
                        )),
                        p.objectData.type)
                    ) {
                        case "image":
                        case "flash":
                        case "video":
                            100 < t.differenceWidthAsPercent &&
                                t.differenceWidthAsPercent >
                                    t.differenceHeightAsPercent &&
                                ((t.objectWidth = t.maxWidth),
                                (t.objectHeight = parseInt(
                                    (t.objectHeight /
                                        t.differenceWidthAsPercent) *
                                        100
                                ))),
                                100 < t.differenceHeightAsPercent &&
                                    t.differenceHeightAsPercent >
                                        t.differenceWidthAsPercent &&
                                    ((t.objectWidth = parseInt(
                                        (t.objectWidth /
                                            t.differenceHeightAsPercent) *
                                            100
                                    )),
                                    (t.objectHeight = t.maxHeight)),
                                100 < t.differenceHeightAsPercent &&
                                    t.differenceWidthAsPercent <
                                        t.differenceHeightAsPercent &&
                                    ((t.objectWidth = parseInt(
                                        (t.maxWidth /
                                            t.differenceHeightAsPercent) *
                                            t.differenceWidthAsPercent
                                    )),
                                    (t.objectHeight = t.maxHeight));
                            break;
                        case "error":
                            !isNaN(t.objectWidth) &&
                                t.objectWidth > t.maxWidth &&
                                (t.objectWidth = t.maxWidth);
                            break;
                        default:
                            (isNaN(t.objectWidth) ||
                                t.objectWidth > t.maxWidth) &&
                                !p.settings.forceWidth &&
                                (t.objectWidth = t.maxWidth),
                                ((isNaN(t.objectHeight) &&
                                    "auto" !== t.objectHeight) ||
                                    t.objectHeight > t.maxHeight) &&
                                    !p.settings.forceHeight &&
                                    (t.objectHeight = t.maxHeight);
                    }
                p.settings.forceWidth
                    ? (t.maxWidth = t.objectWidth)
                    : e.attr(p._prefixAttributeName("max-width")) &&
                      (t.maxWidth = e.attr(
                          p._prefixAttributeName("max-width")
                      )),
                    p.settings.forceHeight
                        ? (t.maxHeight = t.objectHeight)
                        : e.attr(p._prefixAttributeName("max-height")) &&
                          (t.maxHeight = e.attr(
                              p._prefixAttributeName("max-height")
                          )),
                    p._adjustDimensions(e, t);
            },
            _adjustDimensions: function (e, t) {
                e.css({
                    width: t.objectWidth,
                    height: t.objectHeight,
                    "max-width": t.maxWidth,
                    "max-height": t.maxHeight,
                }),
                    p.objects.contentInner.css({
                        width: e.outerWidth(),
                        height: e.outerHeight(),
                        "max-width": "100%",
                    }),
                    p.objects.case.css({
                        width: p.objects.contentInner.outerWidth(),
                    }),
                    p.objects.case.css({
                        "margin-top": parseInt(
                            -p.objects.case.outerHeight() / 2
                        ),
                        "margin-left": parseInt(
                            -p.objects.case.outerWidth() / 2
                        ),
                    });
            },
            _loading: function (e) {
                "start" === e
                    ? (p.objects.case.addClass(
                          p.settings.classPrefix + "loading"
                      ),
                      p.objects.loading.show())
                    : "end" === e &&
                      (p.objects.case.removeClass(
                          p.settings.classPrefix + "loading"
                      ),
                      p.objects.loading.hide());
            },
            getViewportDimensions: function () {
                return {
                    windowWidth: s(window).innerWidth(),
                    windowHeight: s(window).innerHeight(),
                };
            },
            _verifyDataUrl: function (e) {
                return (
                    !(!e || void 0 === e || "" === e) &&
                    (-1 < e.indexOf("#") &&
                        (e = "#" + (e = e.split("#"))[e.length - 1]),
                    p._normalizeUrl(e.toString()))
                );
            },
            _verifyDataType: function (e) {
                var t,
                    n = p.settings.typeMapping;
                if (!e) return !1;
                for (t in n)
                    if (n.hasOwnProperty(t))
                        for (
                            var i = n[t].split(","), o = 0;
                            o < i.length;
                            o++
                        ) {
                            var s = i[o].toLowerCase(),
                                r = new RegExp(".(" + s + ")$", "i"),
                                a = e.toLowerCase().split("?")[0].substr(-5);
                            if (
                                !0 === r.test(a) ||
                                ("inline" === t && -1 < e.indexOf(s))
                            )
                                return t;
                        }
                return "iframe";
            },
            _addElements: function () {
                (void 0 !== p.objects.case &&
                    s("#" + p.objects.case.attr("id")).length) ||
                    p.settings.markup();
            },
            _showContent: function (e) {
                switch (
                    (p.objects.case.attr(
                        p._prefixAttributeName("type"),
                        p.objectData.type
                    ),
                    (p.cache.object = e),
                    p._calculateDimensions(e),
                    p._callHooks(p.settings.onFinish),
                    p.settings.transitionIn)
                ) {
                    case "scrollTop":
                    case "scrollRight":
                    case "scrollBottom":
                    case "scrollLeft":
                    case "scrollHorizontal":
                    case "scrollVertical":
                        p.transition.scroll(
                            p.objects.case,
                            "in",
                            p.settings.speedIn
                        ),
                            p.transition.fade(
                                p.objects.contentInner,
                                "in",
                                p.settings.speedIn
                            );
                        break;
                    case "elastic":
                        p.objects.case.css("opacity") < 1 &&
                            (p.transition.zoom(
                                p.objects.case,
                                "in",
                                p.settings.speedIn
                            ),
                            p.transition.fade(
                                p.objects.contentInner,
                                "in",
                                p.settings.speedIn
                            ));
                    case "fade":
                    case "fadeInline":
                        p.transition.fade(
                            p.objects.case,
                            "in",
                            p.settings.speedIn
                        ),
                            p.transition.fade(
                                p.objects.contentInner,
                                "in",
                                p.settings.speedIn
                            );
                        break;
                    default:
                        p.transition.fade(p.objects.case, "in", 0);
                }
                p._loading("end"), (p.isBusy = !1);
            },
            _processContent: function () {
                switch (((p.isBusy = !0), p.settings.transitionOut)) {
                    case "scrollTop":
                    case "scrollRight":
                    case "scrollBottom":
                    case "scrollLeft":
                    case "scrollVertical":
                    case "scrollHorizontal":
                        p.objects.case.is(":hidden")
                            ? (p.transition.fade(
                                  p.objects.case,
                                  "out",
                                  0,
                                  0,
                                  function () {
                                      p._loadContent();
                                  }
                              ),
                              p.transition.fade(
                                  p.objects.contentInner,
                                  "out",
                                  0
                              ))
                            : p.transition.scroll(
                                  p.objects.case,
                                  "out",
                                  p.settings.speedOut,
                                  function () {
                                      p._loadContent();
                                  }
                              );
                        break;
                    case "fade":
                        p.objects.case.is(":hidden")
                            ? p.transition.fade(
                                  p.objects.case,
                                  "out",
                                  0,
                                  0,
                                  function () {
                                      p._loadContent();
                                  }
                              )
                            : p.transition.fade(
                                  p.objects.case,
                                  "out",
                                  p.settings.speedOut,
                                  0,
                                  function () {
                                      p._loadContent();
                                  }
                              );
                        break;
                    case "fadeInline":
                    case "elastic":
                        p.objects.case.is(":hidden")
                            ? p.transition.fade(
                                  p.objects.case,
                                  "out",
                                  0,
                                  0,
                                  function () {
                                      p._loadContent();
                                  }
                              )
                            : p.transition.fade(
                                  p.objects.contentInner,
                                  "out",
                                  p.settings.speedOut,
                                  0,
                                  function () {
                                      p._loadContent();
                                  }
                              );
                        break;
                    default:
                        p.transition.fade(
                            p.objects.case,
                            "out",
                            0,
                            0,
                            function () {
                                p._loadContent();
                            }
                        );
                }
            },
            _handleEvents: function () {
                p._unbindEvents(),
                    p.objects.nav.children().not(p.objects.close).hide(),
                    p.isSlideshowEnabled() &&
                        (p.objects.nav.hasClass(
                            p.settings.classPrefix + "paused"
                        )
                            ? p._stopTimeout()
                            : p._startTimeout()),
                    p.settings.liveResize && p._watchResizeInteraction(),
                    p.objects.close.click(function (e) {
                        e.preventDefault(), p.close();
                    }),
                    !0 === p.settings.closeOnOverlayClick &&
                        p.objects.overlay
                            .css("cursor", "pointer")
                            .click(function (e) {
                                e.preventDefault(), p.close();
                            }),
                    !0 === p.settings.useKeys && p._addKeyEvents(),
                    p.objectData.isPartOfSequence &&
                        (p.objects.nav.attr(
                            p._prefixAttributeName("ispartofsequence"),
                            !0
                        ),
                        p.objects.nav.data("items", p._setNavigation()),
                        p.objects.prev.click(function (e) {
                            e.preventDefault(),
                                (!0 !== p.settings.navigateEndless &&
                                    p.item.isFirst()) ||
                                    (p.objects.prev.unbind("click"),
                                    (p.cache.action = "prev"),
                                    p.objects.nav.data("items").prev.click(),
                                    p.isSlideshowEnabled() && p._stopTimeout());
                        }),
                        p.objects.next.click(function (e) {
                            e.preventDefault(),
                                (!0 !== p.settings.navigateEndless &&
                                    p.item.isLast()) ||
                                    (p.objects.next.unbind("click"),
                                    (p.cache.action = "next"),
                                    p.objects.nav.data("items").next.click(),
                                    p.isSlideshowEnabled() && p._stopTimeout());
                        }),
                        p.isSlideshowEnabled() &&
                            (p.objects.play.click(function (e) {
                                e.preventDefault(), p._startTimeout();
                            }),
                            p.objects.pause.click(function (e) {
                                e.preventDefault(), p._stopTimeout();
                            })),
                        !0 === p.settings.swipe &&
                            (s.isPlainObject(s.event.special.swipeleft) &&
                                p.objects.case.on("swipeleft", function (e) {
                                    e.preventDefault(),
                                        p.objects.next.click(),
                                        p.isSlideshowEnabled() &&
                                            p._stopTimeout();
                                }),
                            s.isPlainObject(s.event.special.swiperight) &&
                                p.objects.case.on("swiperight", function (e) {
                                    e.preventDefault(),
                                        p.objects.prev.click(),
                                        p.isSlideshowEnabled() &&
                                            p._stopTimeout();
                                })));
            },
            _addKeyEvents: function () {
                s(document).bind("keyup.lightcase", function (e) {
                    if (!p.isBusy)
                        switch (e.keyCode) {
                            case 27:
                                p.objects.close.click();
                                break;
                            case 37:
                                p.objectData.isPartOfSequence &&
                                    p.objects.prev.click();
                                break;
                            case 39:
                                p.objectData.isPartOfSequence &&
                                    p.objects.next.click();
                        }
                });
            },
            _startTimeout: function () {
                p.objects.play.hide(),
                    p.objects.pause.show(),
                    (p.cache.action = "next"),
                    p.objects.nav.removeClass(
                        p.settings.classPrefix + "paused"
                    ),
                    (p.timeout = setTimeout(function () {
                        p.objects.nav.data("items").next.click();
                    }, p.settings.timeout));
            },
            _stopTimeout: function () {
                p.objects.play.show(),
                    p.objects.pause.hide(),
                    p.objects.nav.addClass(p.settings.classPrefix + "paused"),
                    clearTimeout(p.timeout);
            },
            _setNavigation: function () {
                var e = s(p.cache.selector || p.settings.attr),
                    t = p.objectData.sequenceLength - 1,
                    n = {
                        prev: e.eq(p.objectData.prevIndex),
                        next: e.eq(p.objectData.nextIndex),
                    };
                return (
                    0 < p.objectData.currentIndex
                        ? p.objects.prev.show()
                        : (n.prevItem = e.eq(t)),
                    p.objectData.nextIndex <= t
                        ? p.objects.next.show()
                        : (n.next = e.eq(0)),
                    !0 === p.settings.navigateEndless &&
                        (p.objects.prev.show(), p.objects.next.show()),
                    n
                );
            },
            item: {
                isFirst: function () {
                    return 0 === p.objectData.currentIndex;
                },
                isLast: function () {
                    return (
                        p.objectData.currentIndex ===
                        p.objectData.sequenceLength - 1
                    );
                },
            },
            _cloneObject: function (e) {
                var t = e.clone(),
                    n = e.attr("id");
                return (
                    e.is(":hidden")
                        ? (p._cacheObjectData(e),
                          e
                              .attr("id", p.settings.idPrefix + "temp-" + n)
                              .empty())
                        : t.removeAttr("id"),
                    t.show()
                );
            },
            isMobileDevice: function () {
                return !!navigator.userAgent
                    .toLowerCase()
                    .match(p.settings.mobileMatchExpression);
            },
            isTransitionSupported: function () {
                var e,
                    t = s("body").get(0),
                    n = !1,
                    i = {
                        transition: "",
                        WebkitTransition: "-webkit-",
                        MozTransition: "-moz-",
                        OTransition: "-o-",
                        MsTransition: "-ms-",
                    };
                for (e in i)
                    i.hasOwnProperty(e) &&
                        e in t.style &&
                        ((p.support.transition = i[e]), (n = !0));
                return n;
            },
            transition: {
                fade: function (e, t, n, i, o) {
                    var s = "in" === t,
                        r = {},
                        t = e.css("opacity"),
                        a = {},
                        i = i || (s ? 1 : 0);
                    (!p.isOpen && s) ||
                        ((r.opacity = t),
                        (a.opacity = i),
                        e.css(r).show(),
                        p.support.transitions
                            ? ((a[p.support.transition + "transition"] =
                                  n + "ms ease"),
                              setTimeout(function () {
                                  e.css(a),
                                      setTimeout(function () {
                                          e.css(
                                              p.support.transition +
                                                  "transition",
                                              ""
                                          ),
                                              !o || (!p.isOpen && s) || o();
                                      }, n);
                              }, 15))
                            : (e.stop(), e.animate(a, n, o)));
                },
                scroll: function (e, t, n, i) {
                    var o = "in" === t,
                        s = o
                            ? p.settings.transitionIn
                            : p.settings.transitionOut,
                        r = "left",
                        a = {},
                        l = o ? 0 : 1,
                        c = o ? "-50%" : "50%",
                        d = {},
                        t = o ? 1 : 0,
                        u = o ? "50%" : "-50%";
                    if (p.isOpen || !o) {
                        switch (s) {
                            case "scrollTop":
                                r = "top";
                                break;
                            case "scrollRight":
                                (c = o ? "150%" : "50%"),
                                    (u = o ? "50%" : "150%");
                                break;
                            case "scrollBottom":
                                (r = "top"),
                                    (c = o ? "150%" : "50%"),
                                    (u = o ? "50%" : "150%");
                                break;
                            case "scrollHorizontal":
                                (c = o ? "150%" : "50%"),
                                    (u = o ? "50%" : "-50%");
                                break;
                            case "scrollVertical":
                                (r = "top"),
                                    (c = o ? "-50%" : "50%"),
                                    (u = o ? "50%" : "150%");
                        }
                        if ("prev" === p.cache.action)
                            switch (s) {
                                case "scrollHorizontal":
                                    (c = o ? "-50%" : "50%"),
                                        (u = o ? "50%" : "150%");
                                    break;
                                case "scrollVertical":
                                    (c = o ? "150%" : "50%"),
                                        (u = o ? "50%" : "-50%");
                            }
                        (a.opacity = l),
                            (a[r] = c),
                            (d.opacity = t),
                            (d[r] = u),
                            e.css(a).show(),
                            p.support.transitions
                                ? ((d[p.support.transition + "transition"] =
                                      n + "ms ease"),
                                  setTimeout(function () {
                                      e.css(d),
                                          setTimeout(function () {
                                              e.css(
                                                  p.support.transition +
                                                      "transition",
                                                  ""
                                              ),
                                                  !i || (!p.isOpen && o) || i();
                                          }, n);
                                  }, 15))
                                : (e.stop(), e.animate(d, n, i));
                    }
                },
                zoom: function (e, t, n, i) {
                    var o = "in" === t,
                        s = {},
                        r = e.css("opacity"),
                        a = o ? "scale(0.75)" : "scale(1)",
                        l = {},
                        c = o ? 1 : 0,
                        t = o ? "scale(1)" : "scale(0.75)";
                    (!p.isOpen && o) ||
                        ((s.opacity = r),
                        (s[p.support.transition + "transform"] = a),
                        (l.opacity = c),
                        e.css(s).show(),
                        p.support.transitions
                            ? ((l[p.support.transition + "transform"] = t),
                              (l[p.support.transition + "transition"] =
                                  n + "ms ease"),
                              setTimeout(function () {
                                  e.css(l),
                                      setTimeout(function () {
                                          e.css(
                                              p.support.transition +
                                                  "transform",
                                              ""
                                          ),
                                              e.css(
                                                  p.support.transition +
                                                      "transition",
                                                  ""
                                              ),
                                              !i || (!p.isOpen && o) || i();
                                      }, n);
                              }, 15))
                            : (e.stop(), e.animate(l, n, i)));
                },
            },
            _callHooks: function (e) {
                "object" == typeof e &&
                    s.each(e, function (e, t) {
                        "function" == typeof t && t.call(p.origin);
                    });
            },
            _cacheObjectData: function (e) {
                s.data(e, "cache", { id: e.attr("id"), content: e.html() }),
                    (p.cache.originalObject = e);
            },
            _restoreObject: function () {
                var e = s('[id^="' + p.settings.idPrefix + 'temp-"]');
                e.attr("id", s.data(p.cache.originalObject, "cache").id),
                    e.html(s.data(p.cache.originalObject, "cache").content);
            },
            resize: function () {
                p.isOpen &&
                    (p.isSlideshowEnabled() && p._stopTimeout(),
                    (p.dimensions = p.getViewportDimensions()),
                    p._calculateDimensions(p.cache.object));
            },
            _cacheScrollPosition: function () {
                var e = s(window),
                    t = s(document),
                    n = { top: e.scrollTop(), left: e.scrollLeft() };
                (p.cache.scrollPosition = p.cache.scrollPosition || {}),
                    t.width() > e.width() &&
                        (p.cache.scrollPosition.left = n.left),
                    t.height() > e.height() &&
                        (p.cache.scrollPosition.top = n.top);
            },
            _watchResizeInteraction: function () {
                s(window).resize(p.resize);
            },
            _unwatchResizeInteraction: function () {
                s(window).off("resize", p.resize);
            },
            _watchScrollInteraction: function () {
                s(window).scroll(p._cacheScrollPosition);
            },
            _unwatchScrollInteraction: function () {
                s(window).off("scroll", p._cacheScrollPosition);
            },
            _restoreScrollPosition: function () {
                s(window)
                    .scrollTop(parseInt(p.cache.scrollPosition.top))
                    .scrollLeft(parseInt(p.cache.scrollPosition.left))
                    .resize();
            },
            _switchToFullScreenMode: function () {
                (p.settings.shrinkFactor = 1),
                    (p.settings.overlayOpacity = 1),
                    s("html").addClass(
                        p.settings.classPrefix + "fullScreenMode"
                    );
            },
            _open: function () {
                switch (
                    ((p.isOpen = !0),
                    (p.support.transitions =
                        !!p.settings.cssTransitions &&
                        p.isTransitionSupported()),
                    (p.support.mobileDevice = p.isMobileDevice()),
                    p.support.mobileDevice &&
                        (s("html").addClass(
                            p.settings.classPrefix + "isMobileDevice"
                        ),
                        p.settings.fullScreenModeForMobile &&
                            p._switchToFullScreenMode()),
                    p.settings.transitionIn ||
                        (p.settings.transitionIn = p.settings.transition),
                    p.settings.transitionOut ||
                        (p.settings.transitionOut = p.settings.transition),
                    p.settings.transitionIn)
                ) {
                    case "fade":
                    case "fadeInline":
                    case "elastic":
                    case "scrollTop":
                    case "scrollRight":
                    case "scrollBottom":
                    case "scrollLeft":
                    case "scrollVertical":
                    case "scrollHorizontal":
                        p.objects.case.is(":hidden") &&
                            (p.objects.close.css("opacity", 0),
                            p.objects.overlay.css("opacity", 0),
                            p.objects.case.css("opacity", 0),
                            p.objects.contentInner.css("opacity", 0)),
                            p.transition.fade(
                                p.objects.overlay,
                                "in",
                                p.settings.speedIn,
                                p.settings.overlayOpacity,
                                function () {
                                    p.transition.fade(
                                        p.objects.close,
                                        "in",
                                        p.settings.speedIn
                                    ),
                                        p._handleEvents(),
                                        p._processContent();
                                }
                            );
                        break;
                    default:
                        p.transition.fade(
                            p.objects.overlay,
                            "in",
                            0,
                            p.settings.overlayOpacity,
                            function () {
                                p.transition.fade(p.objects.close, "in", 0),
                                    p._handleEvents(),
                                    p._processContent();
                            }
                        );
                }
                s("html").addClass(p.settings.classPrefix + "open"),
                    p.objects.case.attr("aria-hidden", "false");
            },
            close: function () {
                switch (
                    ((p.isOpen = !1),
                    p.isSlideshowEnabled() &&
                        (p._stopTimeout(),
                        p.objects.nav.removeClass(
                            p.settings.classPrefix + "paused"
                        )),
                    p.objects.loading.hide(),
                    p._unbindEvents(),
                    p._unwatchResizeInteraction(),
                    p._unwatchScrollInteraction(),
                    s("html").removeClass(p.settings.classPrefix + "open"),
                    p.objects.case.attr("aria-hidden", "true"),
                    p.objects.nav.children().hide(),
                    p._restoreScrollPosition(),
                    p._callHooks(p.settings.onClose),
                    p.settings.transitionOut)
                ) {
                    case "fade":
                    case "fadeInline":
                    case "scrollTop":
                    case "scrollRight":
                    case "scrollBottom":
                    case "scrollLeft":
                    case "scrollHorizontal":
                    case "scrollVertical":
                        p.transition.fade(
                            p.objects.case,
                            "out",
                            p.settings.speedOut,
                            0,
                            function () {
                                p.transition.fade(
                                    p.objects.overlay,
                                    "out",
                                    p.settings.speedOut,
                                    0,
                                    function () {
                                        p.cleanup();
                                    }
                                );
                            }
                        );
                        break;
                    case "elastic":
                        p.transition.zoom(
                            p.objects.case,
                            "out",
                            p.settings.speedOut,
                            function () {
                                p.transition.fade(
                                    p.objects.overlay,
                                    "out",
                                    p.settings.speedOut,
                                    0,
                                    function () {
                                        p.cleanup();
                                    }
                                );
                            }
                        );
                        break;
                    default:
                        p.cleanup();
                }
            },
            _unbindEvents: function () {
                p.objects.overlay.unbind("click"),
                    s(document).unbind("keyup.lightcase"),
                    p.objects.case.unbind("swipeleft").unbind("swiperight"),
                    p.objects.prev.unbind("click"),
                    p.objects.next.unbind("click"),
                    p.objects.play.unbind("click"),
                    p.objects.pause.unbind("click"),
                    p.objects.close.unbind("click");
            },
            _cleanupDimensions: function () {
                var e = p.objects.contentInner.css("opacity");
                p.objects.case.css({
                    width: "",
                    height: "",
                    top: "",
                    left: "",
                    "margin-top": "",
                    "margin-left": "",
                }),
                    p.objects.contentInner
                        .removeAttr("style")
                        .css("opacity", e),
                    p.objects.contentInner.children().removeAttr("style");
            },
            cleanup: function () {
                p._cleanupDimensions(),
                    p.objects.loading.hide(),
                    p.objects.overlay.hide(),
                    p.objects.case.hide(),
                    p.objects.prev.hide(),
                    p.objects.next.hide(),
                    p.objects.play.hide(),
                    p.objects.pause.hide(),
                    p.objects.case.removeAttr(p._prefixAttributeName("type")),
                    p.objects.nav.removeAttr(
                        p._prefixAttributeName("ispartofsequence")
                    ),
                    p.objects.contentInner.empty().hide(),
                    p.objects.info.children().empty(),
                    p.cache.originalObject && p._restoreObject(),
                    p._callHooks(p.settings.onCleanup),
                    (p.cache = {});
            },
            _matchMedia: function () {
                return window.matchMedia || window.msMatchMedia;
            },
            _devicePixelRatio: function () {
                return window.devicePixelRatio || 1;
            },
            _isPublicMethod: function (e) {
                return "function" == typeof p[e] && "_" !== e.charAt(0);
            },
            _export: function () {
                (window.lightcase = {}),
                    s.each(p, function (e) {
                        p._isPublicMethod(e) && (lightcase[e] = p[e]);
                    });
            },
        };
        p._export(),
            (s.fn.lightcase = function (e) {
                return p._isPublicMethod(e)
                    ? p[e].apply(this, Array.prototype.slice.call(arguments, 1))
                    : "object" != typeof e && e
                    ? void s.error(
                          "Method " + e + " does not exist on jQuery.lightcase"
                      )
                    : p.init.apply(this, arguments);
            });
    })(jQuery),
    document.addEventListener("DOMContentLoaded", function () {
        Handle.init();
    });
let Handle = (function () {
    const e = (e = !1) => {
        let t = window.location.href;
        (-1 === t.indexOf("contact.html#suggestion") && !e) ||
            $(".page-content-form").length ||
            ((e = $('meta[property="og:site_name"]').attr("content")),
            (e = e.toLowerCase().replace(/\b\w/g, function (e) {
                return e.toUpperCase();
            })),
            (htmlContact = `<div class="page-content-form" id="suggestion">
                <div class="box-info">
                    <div class="box-info-title">
                        <p>Suggestion Edits for ${e} Information</p>
                    </div>
                    <div class="box-info-box">
                        <p>At ${e}, Weeblyte highly value your feedback and strive to provide the most accurate and up-to-date information about our brand and offerings. We understand that changes may occur over time, and we appreciate your help in ensuring that our information remains current and reliable.</p>
                        <p>If you have noticed any outdated or incorrect details related to ${e}, locations, menu, or any other information on the Weeblyte website or other platforms, Weeblyte encourage you to submit your suggested edits through the following Edit Form:</p>
                    </div>
                </div>
                <div id="form-contact">
                    <form class="box-form-contact">
                        <div class="form-select">
                            <strong>Is this your business? *</strong><br>
                            <span class="list-item first">
                                <label>
                                    <input type="radio" name="is_business" value="1">
                                    <span class="list-item-label">Yes</span>
                                </label>
                            </span>
                            <span class="list-item last">
                                <label>
                                    <input type="radio" name="is_business" value="0">
                                    <span class="list-item-label">No</span>
                                </label>
                            </span>
                        </div>
                        
                        <div class="form-input">
                            <label>Business Name</label>
                            <input type="text" name="business_name" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Address 1</label>
                            <input type="text" name="address_1" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Address 2</label>
                            <input type="text" name="address_2" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>State</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" class="form-control">
                        </div>
                        <div class="form-input">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control">
                        </div>

                        <div class="form-select">
                            <strong>Status</strong><br>
                            <span class="list-item first">
                                <label>
                                    <input type="radio" name="status_business" value="closed">
                                    <span class="list-item-label">Business Closed</span>
                                </label>
                            </span>
                            <span class="list-item last">
                                <label>
                                    <input type="radio" name="status_business" value="moved">
                                    <span class="list-item-label">Business Moved</span>
                                </label>
                            </span>
                        </div>

                        <div class="form-input">
                            <label>Hours</label>
                            <p>If you have any other suggestions changes regarding opening or closing hours, please let us know.</p>
                            <textarea name="hours" rows="6" class="form-control"></textarea>
                        </div>

                        <div class="form-input">
                            <label>Add more information (Image)</label>
                            <p> If you feel that the images of business are not suitable, please feel free to send additional photos or videos. Upload here.</p>
                            <input type="file">
                        </div>

                        <div class="form-input">
                            <label>Please provide additional information which you think are not suitable for the website. Please send it in detail.</label>
                            <textarea name="content" rows="6" class="form-control"></textarea>
                        </div>
                    </form>
                    <div class="btn-submit-form">
                        <button class="btn-submit-contact">Submit</button>
                    </div>
                </div>
            </div>`),
            $(".travel-info-content").append(htmlContact));
    };
    return {
        init: function () {
            $(".action-content").click(function () {
                $(".table-of-contents .catalog").hasClass("show")
                    ? ($(".table-of-contents .catalog").removeClass("show"),
                      $(".action-content").text(" Show "))
                    : ($(".table-of-contents .catalog").addClass("show"),
                      $(".action-content").text(" Hide "));
            }),
                $(".image-gallery__item").lightcase(),
                (() => {
                    $("div.header-full-slide").width();
                    $(document).ready(function () {
                        $("ul.menu-list-items li").hover(function () {
                            $(".info-box-r img").removeClass("show"),
                                $(".info-box-r img").addClass("hidden");
                            var e = $(this).index();
                            $(".info-box-r img").eq(e).addClass("show"),
                                $(".info-box-r img")
                                    .eq(e)
                                    .removeClass("hidden");
                        });
                    }),
                        $(".header-mobile .nav-icons").on("click", function () {
                            $(this).hasClass("open")
                                ? ($(this).removeClass("open"),
                                  $(this)
                                      .closest(".header-mobile")
                                      .find("#overlay")
                                      .removeClass("open"))
                                : ($(this).addClass("open"),
                                  $(this)
                                      .closest(".header-mobile")
                                      .find("#overlay")
                                      .addClass("open"));
                        }),
                        $(".header-mobile .menu-children").on(
                            "click",
                            function () {
                                let e = $(this).closest("li").find(".subnav1");
                                var t = e.hasClass("hidden");
                                $(".subnav1")
                                    .removeClass("show")
                                    .addClass("hidden"),
                                    $(".itm-nav-icon1")
                                        .removeClass("miUp")
                                        .addClass("miDown"),
                                    t
                                        ? (e
                                              .removeClass("hidden")
                                              .addClass("show"),
                                          $(this)
                                              .find(".itm-nav-icon1")
                                              .removeClass("miDown")
                                              .addClass("miUp"))
                                        : (e
                                              .removeClass("show")
                                              .addClass("hidden"),
                                          $(this)
                                              .find(".itm-nav-icon1")
                                              .removeClass("miUp")
                                              .addClass("miDown"));
                            }
                        ),
                        0 < $(".feature-slides .item-slide").length &&
                            $(".feature-slides").slick({
                                autoplay: !0,
                                autoplaySpeed: 4e3,
                                speed: 1500,
                                lazyLoad: "ondemand",
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: !1,
                                dots: !0,
                                infinite: !0,
                                pauseOnHover: !0,
                            }),
                        0 < $(".feature-comment-slides").length &&
                            $(".feature-comment-slides").slick({
                                autoplay: !0,
                                autoplaySpeed: 4e3,
                                speed: 1500,
                                lazyLoad: "ondemand",
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: !1,
                                dots: !0,
                                infinite: !0,
                                pauseOnHover: !0,
                            }),
                        0 < $("#agencies-gallery").length &&
                            $("#agencies-gallery").slick({
                                autoplay: !0,
                                autoplaySpeed: 4e3,
                                speed: 1500,
                                lazyLoad: "ondemand",
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: !1,
                                dots: !0,
                                infinite: !0,
                                pauseOnHover: !0,
                            }),
                        0 < $(".record-restaurant").length &&
                            $(".record-restaurant").on("click", function () {
                                $(this)
                                    .closest("ul")
                                    .find(".record-restaurant")
                                    .removeClass("selected-item"),
                                    $(this).addClass('selected-item"');
                                var e = `<iframe src="${$(this).attr(
                                    "data-iframe-map"
                                )}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
                                $("#map_canvas").html(e),
                                    $(window).width() < 769 &&
                                        $("html,body").animate(
                                            {
                                                scrollTop:
                                                    $("#map_canvas").offset()
                                                        .top,
                                            },
                                            200
                                        );
                            }),
                        $(document).ready(function () {
                            0 < $(".scrollLink").length &&
                                $(".scrollLink").on("click", function () {
                                    var e = $(this).attr("data-id");
                                    $(".scrollLink").removeClass("active"),
                                        $(this).addClass("active"),
                                        $("html,body").animate(
                                            {
                                                scrollTop:
                                                    $("#" + e).offset().top -
                                                    200,
                                            },
                                            500
                                        );
                                });
                        }),
                        $(document).ready(function () {
                            0 < $(".slick-dots").length &&
                                $(document)
                                    .find(".slick-dots")
                                    .each(function () {
                                        1 == $(this).find("li").length &&
                                            $(this).hide();
                                    });
                        });
                })(),
                $("body").on("click", ".load_more_post", function (e) {
                    e.preventDefault();
                    let t = $(this);
                    e = t.attr("data-category");
                    let n = t.attr("data-page");
                    $.ajax({
                        url: base_url_domain + "ajax/load_data_post",
                        type: "POST",
                        dataType: "JSON",
                        data: { category_id: e, page: n },
                        beforeSend: function () {
                            t.html(
                                '<span class="icon-spinner3 spinner spinner--steps"></span>'
                            );
                        },
                    }).done(function (e) {
                        0 < e.count
                            ? (t.html("Load More"),
                              t.attr("data-page", parseInt(n) + 1),
                              $("#load_data").append(e.html))
                            : t.text("Posts are over"),
                            e.count < 10 && t.remove();
                    });
                }),
                $("body").on("change", "select#restaurants_id", function () {
                    var e = $(this).val();
                    e &&
                        $.ajax({
                            url:
                                base_url_domain +
                                "ajax/load_data_banner_restaurant",
                            type: "POST",
                            dataType: "JSON",
                            data: { restaurants_id: e },
                        }).done(function (e) {
                            e = e.data;
                            if (0 < e.length) {
                                $("#restaurants_map").html("");
                                for (var t of e)
                                    $("#restaurants_map").append(
                                        `<li> <img width="100%" src="${t.thumbnail}" alt="${t.title}"/> </li>`
                                    );
                                $("#restaurants_map").slick({
                                    autoplay: !0,
                                    autoplaySpeed: 4e3,
                                    speed: 1500,
                                    lazyLoad: "ondemand",
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: !1,
                                    dots: !0,
                                    infinite: !0,
                                    pauseOnHover: !0,
                                });
                            }
                        });
                }),
                $(document).ready(function () {
                    $(".load_modal_map").on("click", function () {
                        $("#overlay").removeClass("open"),
                            $(".nav-icons").removeClass("open"),
                            $("body").addClass("modal-open");
                    }),
                        $(".close-modal").on("click", function () {
                            $("body").removeClass("modal-open");
                        }),
                        $(".close-modal-children").on("click", function () {
                            $("body").removeClass("modal-open-children"),
                                $("#map_canvas_restaurants").html("");
                        }),
                        $("#custom-modal-parent").on("click", function (e) {
                            let t = $(
                                "#custom-modal-parent .custom-modal-content"
                            );
                            t.is(e.target) ||
                                t.has(e.target).length ||
                                $("body").removeClass("modal-open");
                        }),
                        $("#custom-modal-children").on("click", function () {
                            let e = $(this).find(".custom-modal-content");
                            e.is(event.target) ||
                                e.has(event.target).length ||
                                ($("body").removeClass("modal-open-children"),
                                $("#map_canvas_restaurants").html(""));
                        }),
                        $(".modal-map-address").on("click", function () {
                            $("body").removeClass("modal-open-children");
                            var e = $(
                                "#custom-modal-parent .card-body div.content"
                            ).height();
                            $(
                                "#custom-modal-children .card-body div.content"
                            ).css({ height: e, "overflow-y": "hidden" });
                            var t = $(this)
                                    .closest(".list-item-menu")
                                    .attr("data-title"),
                                e = $(this)
                                    .closest(".list-item-menu")
                                    .attr("data-link");
                            $("#custom-modal-children h3").text(t);
                            e = `<iframe src="${e}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
                            $("#content-map").html(e),
                                $("body").addClass("modal-open-children");
                        });
                }),
                $("body").on("click", ".map-address", function () {
                    var e = `<iframe src="${$(this)
                        .closest(".list-item-menu")
                        .attr(
                            "data-link"
                        )}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;
                    $("#map_canvas_restaurants").html(e), $(".modal").show();
                }),
                $("body").on("click", "span.close", function () {
                    $(".modal").hide();
                }),
                $(window).on("click", function (e) {
                    $(e.target).is(".modal") && $(".modal").hide();
                }),
                $("body").on("click", ".kksr-star", function (e) {
                    $(".kksr-star").removeClass("act"), $(this).addClass("act");
                }),
                $("body").on("click", ".btn_sumbit_review", function (e) {
                    e.preventDefault();
                    var t = $('.form_review input[name="address"]').val(),
                        n = $('.form_review input[name="full_name"]').val(),
                        i = $('.form_review textarea[name="content"]').val(),
                        e = $(".kksr-star.act").attr("data-star");
                    $.ajax({
                        url: base_url_domain + "ajax/submitReview",
                        data: { address: t, full_name: n, content: i, vote: e },
                        type: "POST",
                        dataType: "JSON",
                    }).done(function (e) {
                        $(".form_review .text-danger").remove(),
                            "warning" === e.type
                                ? $.each(e.validation, function (e, t) {
                                      $(
                                          '.form_review [name="' + e + '"]'
                                      ).after(t);
                                  })
                                : ($(".data-review").prepend(e.html),
                                  $('.form_review [name="content"]').val(""));
                    });
                }),
                $("body").on("click", ".btn_load_more_review", function (e) {
                    e.preventDefault();
                    let t = $(this).attr("data-page");
                    $.ajax({
                        url: base_url_domain + "ajax/loadMoreReview",
                        data: { page: t },
                        type: "POST",
                        dataType: "JSON",
                    }).done(function (e) {
                        5 != e.count && $(".btn_load_more_review").remove(),
                            (t = parseInt(t) + 1),
                            $(".btn_load_more_review").attr("data-page", t),
                            $(".data-review").append(e.html);
                    });
                }),
                e(),
                $("body").on("click", ".box-form-contact", function () {
                    e(1);
                }),
                $("body").on("click", ".btn-submit-contact", function (e) {
                    e.preventDefault(),
                        $.ajax({
                            url: base_url_domain + "ajax/submitContact",
                            type: "POST",
                            dataType: "JSON",
                            data: $(".box-form-contact").serialize(),
                        }).done(function (e) {
                            $(".text-danger").remove(),
                                "warning" === e.status
                                    ? $.each(e.validation, function (e, t) {
                                          $(".box-form-contact")
                                              .find('[name="' + e + '"]')
                                              .after(t);
                                      })
                                    : ($(".box-form-contact").trigger("reset"),
                                      $(
                                          "#form-contact .box-form-contact"
                                      ).after(
                                          '<p class="contact-success">' +
                                              e.message +
                                              "</p>"
                                      ));
                        });
                });
        },
    };
})();
