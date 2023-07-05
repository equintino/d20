/** Modal */
(function (root, factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
      // AMD
      define(['jquery'], factory);
    } else if (typeof exports === 'object') {
      // Node, CommonJS-like
      module.exports = factory(require('jquery'));
    } else {
      // Browser globals (root is window)
      root.modal = factory(root.jQuery);
    }
}(this, function init($, undefined) {
    return {
        nameModal: $("#boxe_main"),
        mask: $("#mask_main"),
        title: $("#boxe_main #title"),
        message: $("#boxe_main #message"),
        content: $("#boxe_main #content"),
        buttons: $("#boxe_main #buttons, #div_dialogue #buttons")
            .css("margin-top", "-10px"),
        dialogue: $("#div_dialogue"),
        closeEnable: () => {
            /** execute only once */
            if (typeof(closeEnable) === "undefined") {
                modal.nameModal.find(".close").on("click", () => {
                    modal.hideContent();
                    closeEnable = 1;
                });
            }
        },
        beforeSend:({}),
        escapeEnable: () => {
            let that = this;
            /** execute only once */
            if (typeof(escapeEnable) === "undefined") {
                $(document).on("keyup", (e) => {
                    if (e.keyCode === 27) {
                        that.hideContent();
                        escapeEnable = 1;
                    }
                });
            }
        },
        clickMaskEnable: () => {
            let that = this;
            /** execute only once */
            if (typeof(closeMaskEnable) === "undefined") {
                this.mask.on("click", () => {
                    that.hideContent();
                    closeMaskEnable = 1;
                });
            }
        },
        /** @var title, message, content */
        show: (params) => {
            loading.show({
                text: "loading..."
            })
            modal.closeEnable()
            if (params.title != null) modal.title.html(params.title.toUpperCase()).show()
            if (params.message != null) modal.message.html(params.message).show().css({
                "overflow-y": "auto",
                "max-height": "450px"
            })
            if (params.content != null) {
                modal.content.load(params.content, params.params, () => {
                    if (params.callback != null) {
                        params.callback()
                    }
                    modal.complete()
                    loading.hide()
                })
                .show()
            } else {
                loading.hide()
            }
            if (params.buttons != null) modal.buttons.html(params.buttons).show();
            if (params.html != null) modal.content.html(params.html).show();
            modal.mask.show();
            modal.nameModal.show().css({
                display: "flex",
                top: 0
            });
            return modal;
        },
        hideContent: () => {
            let indexMask = modal.mask.css("z-index");
            if (indexMask == 4) {
                modal.dialogue.hide();
                modal.dialogue.find("#title").hide().find("html").remove();
                modal.dialogue.find("#message").hide().find("html").remove();
                modal.dialogue.find("#content").hide().html("");
                modal.dialogue.find("#buttons").hide().find("html").remove();
                modal.mask.css("z-index","2");
            } else if (indexMask == 2) {
                modal.title.hide().find("html").remove();
                modal.message.hide().find("html").remove();
                modal.content.hide().html("");
                modal.buttons.hide().find("html").remove();
                modal.nameModal.hide().find("html").remove();
                modal.dialogue.find("#title").hide().find("html").remove();
                modal.dialogue.find("#message").hide().find("html").remove();
                modal.dialogue.find("#content").hide();
                modal.dialogue.find("#buttons").hide().find("html").remove();
                modal.dialogue.hide()
                modal.mask.hide();
            }
        },
        hide: () => {
            $("#boxe_main, #div_dialogue").hide()
        },
        confirm: (params) => {
            modal.dialogue.find("#title").html(params.title.toUpperCase()).show()
            modal.dialogue.find("#message").html(params.message).show()
            if (typeof params.content !== "undefined") {
                modal.dialogue.find("#content").html(params.content).show()
            }
            if (typeof(params.callback) !== "undefined") {
                params.callback()
            }
            if (typeof params.buttons !== "undefined") {
                modal.dialogue.find("#buttons").html(params.buttons).show()
            } else {
                modal.dialogue.find("#buttons").html("<div align='right'><button class='btn btn-rpg btn-silver' value='0'>Cancela</button><button class='btn btn-rpg btn-danger' style='margin-left: 3px' value='1'>Confirma</button></div>").show()
            }
            modal.dialogue.fadeIn().css({
                display: "flex",
                height: "85.6px"
            })
            if (modal.mask.css("z-index") == 2 && modal.mask.css("display") !== "none") {
                modal.mask.css({
                    "z-index": "4"
                });
            }
            modal.mask.show()

            return modal.dialogue.find("button").on("click", (e) => {
                modal.hideContent()
                return e.target.value
            })
        },
        open: (params) => {
            loading.show({
                text: "loading..."
            })
            modal.closeEnable()
            if (params.title != null) {
                modal.title.html(params.title.toUpperCase()).show()
            }
            if (params.message != null) {
                modal.message.html(params.message).show()
            }
            if (params.content != null) {
                modal.content.load(params.content, params.params, () => {
                    loading.hide()
                })
                .show()
            }
            if (params.buttons != null) {
                modal.nameModal.find("#buttons").html(params.buttons).show()
            }
            modal.mask.fadeIn()
            modal.nameModal.fadeIn().css({
                display: "flex",
                top: 0
            });
            return modal;
        },
        modal: (params) => {
            loading.show({
                text: "loading..."
            })
            let that = this;
            if (params.title != null) modal.dialogue.find("#title").html(params.title.toUpperCase()).show()
            if (params.message != null) modal.dialogue.find("#message").html(params.message).show()
            if (params.content != null) {
                modal.dialogue.find("#content").load(params.content, params.params, () => {
                    if (params.callback != null) {
                        params.callback()
                    }
                    loading.hide()
                })
                .show()
            } else {
                loading.hide()
            }
            if (params.html != null) modal.dialogue.find("#content").html(params.html).show()
            if (params.buttons != null) modal.dialogue.find("#buttons").html(params.buttons).show()

            modal.dialogue.fadeIn().css({
                display: "flex",
                height: "490px"
            })
            modal.dialogue.find("#content").css({
                "overflow-y": "auto",
            })
            $("#mask_main").css({
                "z-index": "4"
            }).show()
            return modal;
        },
        new: (params) => {
            loading.show({
                text: "loading..."
            })
            $("body").append(
                "<section id='" + params.box + "' ><div id='title' class='title'></div><span id='message'></span><div id='content'></div></section>"
            )
            let idName = $("#" + params.box);
            idName.css({
                position: "fixed",
                top: "30px",
                left: "25%",
                width: "50%",
                "z-index": "10",
                background: "white"
            })
            idName.find("#title").html(params.title.toUpperCase()).show().css({
                background: "var(--cor-primary)",
                color: "white",
                "font-size": "var(--title-size)",
                "font-weight": "var(--title-weight)",
                "padding-left": "10px"
            })
            idName.find("#content").load(params.content, params.params, function() {
                let buttons = "<div style='text-align: right; margin-bottom: -25px'>" + params.buttons + "</div>";
                $(this).parent().append(buttons).find("button").css("margin-top","-10px")
                if (params.callback != null) {
                    params.callback()
                }
                loading.hide();
            })
            .css({
                "max-height": "450px",
                "overflow-y": "scroll",
                "background": "#626262 none repeat scroll 0% 0%",
                "padding" : "10px 25px"
            })
            this.mask.css({
                "z-index": "4"
            })
        },
        on: (event, func) => {
            modal.buttons.find("button").on(event, (e) => {
                func(e)
            })
        },
        event: (event, func) => {
            modal.content.on(event, (e) => {
                func(e)
            })
        },
        complete: (params) => {
            if (typeof(params) !== "undefined") {
                modal.content.on("submit", (e) => {
                    e.preventDefault();
                });
                modal.buttons.html(params.buttons).show();
                if (params.callback != null) params.callback();
            }
            return modal
        },
        callback: (p, func) => {
            func(p)
        },
        close: (params) => {
            $("#mask_main").trigger("click");
        },
        styles: (params) => {
            modal.buttons.find("button").css({
                "border-radius": "0 0 5px 5px"
            })
            if (params != null && params.element != null) {
                $(params.element).css(params.css)
            }
            return modal
        }
    };
}))

/** loading */
var loading = {
    source: "../themes/img/loading.png",
    height: "100%",
    width: "100%",
    show: (params="") => {
        var text = (params != "" ? params.text : "") ;
        var source = (params.source ? params.source : this.source);
        $(".loading").show();
        $(".text-loading").html(text).show();
        return this;
    },
    hide: () => {
        $(".loading, .text-loading").hide();
    }
};

/** alert message */
var alertLatch = (text, background) => {
    let box = $("#alert").html(text).css("display","none");
    let marginRight = box.width() + 40;
    let css = box.css({
                display: "block",
                overflow: "hidden",
                background: background,
                "margin-right": -marginRight
            });
    css.animate({
            "margin-right": "0"
        }, 1000, () => {
            setTimeout(() => {
                $("#alert").animate({
                    "margin-right": -marginRight
                }, setTimeout(() => {
                    box.css("display", "none")
                }, 15000));
            }, 5000);
        });
    $("#alert").on("click", () => {
        css.animate({
                "margin-right": "0"
            }, 1000, () => {
                setTimeout(() => {
                    $("#alert").animate({
                    "margin-right": -marginRight
                    });
                }, 3000);
        });
    });
};

/** save configuration */
var saveForm = function(act, action, connectionName = null, url = "../Suporte/Ajax/save.php") {
    let success;
    let data = $("#boxe_main form").serialize();
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        async: false,
        data: {
            act: act,
            action: action,
            connectionName: connectionName,
            data: data
        },
        beforeSend: function() {
            loading.show({
                text: "salvando"
            });
        },
        success: function(response) {
            let background;
            if (response.indexOf("success") !== -1) {
                background = "var(--cor-success)";
                success = true;
            } else {
                background = "var(--cor-warning)";
                success = false;
            }
            alertLatch(response, background);
        },
        error: function(error) {
            alertLatch(error, "var(--cor-danger)");
        },
        complete: function() {
            loading.hide();
        }
    });
    if (success) {
        $(".content").load("config", function() {
            callScript("config");
            $("#boxe_main, #mask_main").hide();
        });
    }
    return success;
};

/** @params array screens(access), element, icon One, icon two */
var insertCheck = function(screens, element, optionGreen, optionRed) {
    element.find("i").removeClass();
    element.each(function() {
        if (screens == " *" || screens.indexOf($(this).text().trim()) !== -1) {
            $(this).find("i").addClass(optionGreen)
                .css("color","green");
        } else {
            $(this).find("i").addClass(optionRed)
                .css("color","red");
        }
    });
};

/** @return object */
var getScreenAccess = function(element, check, groupName) {
    var access = "";
    element.each(function() {
        if ($(this).find("i").hasClass(check)) {
            access += (access.length === 0 ? $(this).text() : "," + $(this).text());
        }
    });
    return {
        access: access,
        name: groupName
    };
};

/**
* @return bool
* @params element, icon One, icon Two
*/
var changeCheck = function(element, optionGreen, optionRed) {
    var currentOption = element.attr("class");
    element.removeClass();
    if (currentOption === optionRed) {
        element.addClass(optionGreen)
            .css("color","green");
    } else {
        element.addClass(optionRed)
            .css("color","red");
    }
    return true;
};

/** @return resp */
var loadData = function(link, data = null, dataType = "JSON", msg = "Loading...", rsp = null) {
    var resp = null;
    $.ajax({
        url: link,
        type: "POST",
        dataType: dataType,
        context: msg,
        async: false,
        data: data,
        beforeSend: function() {
            $("#mask_main").show();
            loading.show({
                text: msg
            });
        },
        success: function(response) {
            resp = response;
        },
        error: function(error) {
            let info = (rsp !== null ? rsp : "Could not load data")
            alertLatch(info, "var(--cor-danger)");
            setTimeout(function() {
                loading.hide();
                $("#mask_main").fadeOut();
            }, setTime);
        },
        complete: function() {
            if($("#boxe_main").css("display") === "none")$("#mask_main").hide();
            loading.hide();
        }
    });
    return resp;
};

/** @return bool with file data */
var saveData = function(link, data, msg = "Saving", rsp = null) {
    var success = false;
    $.ajax({
        url: link,
        type: "POST",
        dataType: "JSON",
        context: msg,
        processData: false,
        contentType: false,
        async: false,
        data: data,
        beforeSend: function() {
            loading.show({
                text: msg
            })
        },
        success: function(response) {
            var background;
            if (response.indexOf("success") !== -1) {
                background = "var(--cor-success)";
                success = true;
            } else if (response.indexOf("danger") !== -1) {
                background = "var(--cor-danger)";
            } else {
                background = "var(--cor-warning";
            }
            alertLatch(response, background);
        },
        error: function(error) {
            let info = (rsp !== null ? rsp : "Could not save change")
            alertLatch(info, "var(--cor-danger)");
        },
        complete: function() {
            if($("#boxe_main").css("display") === "none")$("#mask_main").hide();
            loading.hide();
        }
    });
    return success;
};

/** @return bool */
var saveAjax = function(link, data, msg = "Saving") {
    var success = false;
    $.ajax({
        url: link,
        type: "POST",
        dataType: "JSON",
        context: msg,
        async: false,
        data: data,
        beforeSend: function() {
            $("#mask_main").show();
            loading.show({
                text: msg
            });
        },
        success: function(response) {
            var background;
            if (response.indexOf("success") !== -1) {
                background = "var(--cor-success)";
                success = true;
            } else if (response.indexOf("danger") !== -1) {
                background = "var(--cor-danger)"
            } else {
                background = "var(--cor-warning"
            }
            alertLatch(response, background)
            if (success) {
                $("#mask_main").hide()
            }
            loading.hide()
        },
        error: function(error) {
            alertLatch("Could not save change", "var(--cor-danger)");
            setTimeout(function() {
                loading.hide();
                $("#mask_main").fadeOut();
            }, setTime);
        },
        complete: function() {}
    });
    return success;
};

var sleep = function(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
};

var valReal = function(val) {
    var val = (val != null ? val : "0,00");
    return parseFloat(val.replace(".","").replace(",","."));
};

var moeda = function(val) {
    return parseFloat(val).toLocaleString('pt-br', {minimumFractionDigits: 2, maximumFractionDigits: 2});
};

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}

var getYearMonthDay = function(date, index, name=null) {
    date = date.split("-");
    if (!name || index !== 1) {
        return date[index];
    }
    let conversion = [ "janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
    return conversion[name-1];
};

function monthNumber(month) {
    let conversion = [ "janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
    let m = month.toLowerCase();
    return conversion.indexOf(m) + 1;
}

var thumbImage = (origin, destination) => {
    $(destination).find("img").remove()
    const [file] = origin.files
    let imgs = ""
    let links = []
    for (let i=0; i < origin.files.length; i++) {
        imgs += "<img src='" + URL.createObjectURL(origin.files[i]) + "' style='height: 250px' alt='' />"
        links.push(URL.createObjectURL(origin.files[i]))
    }
    if (file) {
        destination.src = URL.createObjectURL(file)
    }
    return imgs
}

var unserializedData = (data) => {
    let urlParams = new URLSearchParams(data);
    let unserialized = {}; // prepare result object
    let key;
    let value;
    for ([key, value] of urlParams) { // get pair > extract it to key/value
        unserialized[key] = value;
    }
    return unserialized
}

var activeSlick = (id) => {
    $(id).slick({
        infinite: true,
        fade: true,
        dots: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: false,
        variableWidth: false,
        adaptiveHeight: false,
        autoplay: false,
        cssEase: "linear"
    })
}
