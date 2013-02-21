/**
 * User: huangdd<352926@qq.com>
 * Date: 13-1-22
 * Time: 下午1:11
 */

//平台、设备和操作系统
if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)) {
    //alert(navigator.userAgent);
    //window.location.href ="";
} else if (/(Android)/i.test(navigator.userAgent)) {
    //alert(navigator.userAgent);
    //window.location.href ="";
} else {
//    alert('电脑');
    //window.location.href ="";
}
var dd = {
    'mod':'',
    'act':'',
    'init':function (mod, act) {
        this.mod = mod;
        this.act = act;
    },
    'makeUrl':function (params, mod, act) {
        var url = '/ajax.php';
        if (mod == undefined) {
            mod = this.mod;
        }
        if (act == undefined) {
            act = this.act;
        }
        url += "?module=" + mod + "&action=" + act + (params == undefined ? '' : "&p=" + params) + '&' + Math.random(1, 100000);
        return url;
    },
    'getJSON':function (params) {
        var url = this.makeUrl(params);
        $.ajax({
            url:url,
            dataType:'JSON',
            cache:true,
            async:false,
            timeout:300000,
            error:function (res) {
                var debug_info = "浏览器：" + $.browser.version +
                    "\n页面地址：" + location.href +
                    "\n标题：" + document.title +
                    "\n本次请求地址:" + dd.makeUrl(params) +
                    "\n本次响应内容大小:" + res.responseText.length +
                    "\n本次响应内容详情:" + res.responseText;
                alert('服务器状态异常，请您联系技术支持协助处理，联系时请附上此信息。\n\n' + debug_info);

                return false;
            },
            success:function (data) {
                dd.analyze(data);
            }
        });
    },
    'getURL':function () {
    },
    'analyze':function (data) {
        if (typeof data == 'undefined' || data == null) {
            alert('未知异常，请联系管理员。');
            return false;
        }
        if (data.code == 200) {
            if (typeof data.msg != 'undefined' && data.msg != '') {
                alert(data.msg);
            }
            if (typeof data.url != 'undefined' && data.url != '') {
                location.href = data.url;
            }
            if (typeof data.callback != 'undefined' && data.callback != '') {
                var fnlen = data.callback.length;
                if ($.isArray(data.callback)) {
                    for (var i = 0; i < fnlen; i++) {
                        eval(data.callback[i]);
                    }
                } else {
                    eval(data.callback);
                }
            }
        } else {
            if (data.msg.length > 0) {
                alert("错误代码：" + data.code + "\n错误原因：" + data.msg);
            }
            if (typeof data.url != 'undefined' && data.url != null && data.url != '') {
                location.href = data.url;
            }
        }
        var code = data.code;
    },
    'getForm':function (obj, hash) {
        var xbox = new Object();
        var params = '';
        $(obj + " input[type!='button']," + obj + " select," + obj + " textarea").each(function () {
            if (typeof $(this).attr('name') == 'undefined' || $(this).attr('name').length < 0) {
                return true;//继续下一条循环
            } else {
                var name = $(this).attr('name').replace(/(\[|\])/g, '');
            }
            var val = '';
            if ($(this)[0].tagName.toLowerCase() == 'input') {
                switch ($(this).attr('type').toLowerCase()) {
                    case 'radio':
                        if (xbox['r_' + name] == undefined) {
                            xbox['r_' + name] = 1;
                            val = $(obj + ' input[name="' + name + '"]:checked').val();
                        }
                        break;
                    case 'checkbox':
                        if (xbox['c_' + name] == undefined) {
                            xbox['c_' + name] = 1;
                            $(obj + " input[name='" + name + "']:checked").each(function () {
                                val += $(this).val() + '|';
                            });
                            val = val.substring(0, val.length - 1);
                        }
                        break;
                    case 'password':
                        if (typeof hash != 'undefined') {
                            val = $.base64.encode(hex_md5($(this).val()));
                        } else {
                            val = $(this).val();
                        }
                        break;
                    default :
                        val = $(this).val();
                        break;
                }
            } else {
                val = $(this).val();
            }
            if (val != null && typeof val != 'undefined') {
                if (val.length > 0)
                    params += '/' + name + '/' + val;
            }
        });
        params = params.substring(1, params.length);
        return params;
    }
};

var ShowMsg = function () {
}
$(document).ready(function () {
//    dd.init('member', 'auth');
    var group = $.cookie("user");
    if (group != null && group.length > 0) {
        group = eval("(" + group + ")");//转换为json对象
    }
    var user = $.cookie("lastUser");
    console.log(user + ' ' + group)
    if (group != null && group.length > 0) {
        $.each(group, function () {
            if (username == user) {
                $("#loginForm [name=username]").val(user);
                $("#loginForm [name=password]").val(n.password);
                $("#loginForm [name=autologin]").val(n.autologin);
                $("#loginForm [name=logtime]").val(n.logtime);
            }
        });
    }
    $("#loginForm [name=login]").click(function () {
        var username = $("#loginForm [name=username]").val();
        var password = $("#loginForm [name=password]").val();
        if (username == '') {
            alert('请输入用户名');
            $("#loginForm [name=username]").focus();
            return false;
        }
        if (password == '') {
            alert('请输入密码');
            $("#loginForm [name=password]").focus();
            return false;
        }
        dd.init('member', 'login');
        var params = '';
        if ($("#loginForm [name=password]").attr("cookie") == 'true') {
            params = dd.getForm("#loginForm");
        } else {
            params = dd.getForm("#loginForm", true);
        }
        if (params) {
            dd.getJSON(params);
        } else {
            //error
        }
    });
});
