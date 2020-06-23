var arraydata = [];

//it is called everytime some chage occur in the view
//if futher calls updateitem that updates(label, url, showthumbnail)
//and actualizarmenu that updates(dpeth, parent, sort)
function getmenus() {
    arraydata = [];
    $("#spinsavemenu").show();

    var cont = 0;
    $("#menu-to-edit li").each(function(index) {
        var dept = 0;
        for (var i = 0; i < $("#menu-to-edit li").length; i++) {
            var n = $(this)
                .attr("class")
                .indexOf("menu-item-depth-" + i);
            if (n != -1) {
                dept = i;
            }
        }
        var textoiner = $(this)
            .find(".item-edit")
            .text();
        var id = this.id.split("-");
        var textoexplotado = textoiner.split("|");
        var padre = 0;
        if (
            !!textoexplotado[textoexplotado.length - 2] &&
            textoexplotado[textoexplotado.length - 2] != id[2]
        ) {
            padre = textoexplotado[textoexplotado.length - 2];
        }
        arraydata.push({
            depth: dept,
            id: id[2],
            parent: padre,
            sort: cont
        });
        cont++;
    });
    updateitem();
    actualizarmenu();
}

//menu item creation
function addcustommenu() {
    if (!$("#custom-menu-item-name").val()) {
        alert("Enter menu item title");
        return;
    }

    if (!$("#custom-menu-item-url").val()) {
        alert("Enter menu url");
        return;
    }

    //collect data
    var label = $("#custom-menu-item-name").val();
    var link = $("#custom-menu-item-url").val();
    var menuid = $("#idmenu").val();
    var showthumbnail = $("#showthumbnail").is(":checked") ? 1 : 0;
    var module = $("#module").val();
    var moduleslug = $("#" + module).val();
    var data = {
        label,
        link,
        menuid,
        showthumbnail,
        module,
        moduleslug
    };

    $("#spincustomu").show();

    $.ajax({
        data: data,
        url: addMenuItemUrl,
        type: "POST",
        success: function(response) {
            console.log(response);
            window.location.reload();
        },
        complete: function() {
            $("#spincustomu").hide();
        }
    });
}

//update menu item if id is passed otherwise all menu items (label, url, showthumbnail)
function updateitem(id = 0) {
    if (id) {
        var label = $("#idlabelmenu_" + id).val();
        var showthumbnail = $("#showthumbnail_menu_" + id).is(":checked")
            ? 1
            : 0;
        var url = $("#url_menu_" + id).val();

        var data = {
            label: label,
            showthumbnail: showthumbnail,
            link: url,
            id: id
        };
    } else {
        var arr_data = [];
        $(".menu-item-settings").each(function(k, v) {
            var id = $(this)
                .find(".edit-menu-item-id")
                .val();
            var label = $(this)
                .find(".edit-menu-item-title")
                .val();
            var showthumbnail = ($(this)
                .find(".edit-menu-item-showthumbnail")
                .is(":checked"))
                ? 1
                : 0;
            var url = $(this)
                .find(".edit-menu-item-url")
                .val();
            arr_data.push({
                id: id,
                label: label,
                showthumbnail: showthumbnail,
                link: url
            });
        });

        var data = { arraydata: arr_data };
    }

    console.log(data);
    $.ajax({
        data: data,
        url: updateMenuItemUrl,
        type: "POST",
        beforeSend: function(xhr) {
            if (id) {
                $("#spincustomu2").show();
            }
        },
        success: function(response) {},
        complete: function() {
            if (id) {
                $("#spincustomu2").hide();
            }
        }
    });
}

//update menu items(depth, sort, parent) and menu(removed)
function actualizarmenu() {
    $.ajax({
        dataType: "json",
        data: {
            arraydata: arraydata
            //for menu update
            // menuname: $("#menu-name").val(),
            // idmenu: $("#idmenu").val()
        },

        url: menuStructureControllerUrl,
        type: "POST",
        beforeSend: function(xhr) {
            $("#spincustomu2").show();
        },
        success: function(response) {
            console.log("menu items updated");
        },
        complete: function() {
            $("#spincustomu2").hide();
        }
    });
}

//delete menu item
function deleteitem(id) {
      console.log("fas");
    $.ajax({
        dataType: "json",
        data: {
            id: id
        },

        url: deleteMenuItemUrl,
        type: "POST",
        success: function(response) {}
    });
}

//delete menu (root)
function deletemenu() {
    var r = confirm("Do you want to delete this menu ?");
    if (r == true) {
        $.ajax({
            dataType: "json",

            data: {
                id: $("#idmenu").val()
            },

            url: deleteMenuUrl,
            type: "POST",
            beforeSend: function(xhr) {
                $("#spincustomu2").show();
            },
            success: function(response) {
                if (!response.error) {
                    alert(response.resp);
                    window.location = menuwr;
                } else {
                    alert(response.resp);
                }
            },
            complete: function() {
                $("#spincustomu2").hide();
            }
        });
    } else {
        return false;
    }
}

function insertParam(key, value) {
    key = encodeURI(key);
    value = encodeURI(value);

    var kvp = document.location.search.substr(1).split("&");

    var i = kvp.length;
    var x;
    while (i--) {
        x = kvp[i].split("=");

        if (x[0] == key) {
            x[1] = value;
            kvp[i] = x.join("=");
            break;
        }
    }

    if (i < 0) {
        kvp[kvp.length] = [key, value].join("=");
    }

    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join("&");
}

wpNavMenu.registerChange = function() {
    getmenus();
    // console.log(wpNavMenu);
};
