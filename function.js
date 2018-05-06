document.body.innerHTML += '<div id="cart" style="position: fixed; top: 100vh; left: 0px; width: 100%; height: 100vh; z-index: 1000; background: rgba(0, 0, 0, 0.9); overflow: scroll; transition-duration: 0.5s"><div class="section"></div><div class="container" style="opacity: 1"><div class="row"><div class="well"><form action="/camon.php" id="order-form" method="post" enctype="multipart/form-data"><div class="well-content" style="background-color: white; border-radius: 5px 5px 0px 0px"><a class="btn btn-primary pull-right" onclick="$(\'#cart\').css(\'top\',\'100vh\');">Trở về</a><br><h2 class="light-text black-text">Giỏ hàng của bạn</h2><p><i>Thông tin đơn hàng</i></p><table class="table table-striped"><thead><tr class="bg-primary"><th width="20%">Sản phẩm</th><th width="20%">Đơn giá</th><th width="20%">Số lượng</th><th width="20%">Thành tiền</th><th width="20%"></th></tr></thead><tbody id="sp-table"></tbody><tfoot><tr><th></th><th></th><th>Tổng tiền</th><th id="tongtien">0 VND</th><th></th></tr></tfoot></table><p><i>Thông tin khách hàng</i></p><div class="input-group"><span class="input-group-addon bg-blue" style="background-color: #2a9fd6">Họ tên *</span><input id="name" name="name" type="text" class="form-control" pattern="[^/?*:;{}\\\\\\x22\\x3c\\x3e\\x7c]+" title="Tên chứa kí tự không hợp lệ" required></div><div class="input-group"><span class="input-group-addon bg-blue" style="background-color: #2a9fd6">Số điện thoại *</span><input id="phone" name="phone" type="text" class="form-control" pattern="^\\d{6,12}$" title="Số điện thoại chỉ bao gồm số, dài từ 6 đến 12 kí tự" required></div><div class="input-group"><span class="input-group-addon bg-blue" style="background-color: #2a9fd6">Facebook</span><input id="fb" name="fb" type="text" class="form-control"></div><div class="input-group"><span class="input-group-addon bg-blue" style="background-color: #2a9fd6">Địa chỉ giao hàng *</span><input id="address" name="address" type="text" class="form-control" required></div><div class="input-group"><span class="input-group-addon bg-blue" style="background-color: #2a9fd6">Ghi chú gì đó</span><input id="note" name="note" type="text" class="form-control"></div><input type="hidden" id="dssp" name="dssp" value=""/></div><div class="section" style="padding-left: 24px"><button class="btn btn-success" type="submit" name="action">Đặt hàng</button> <a class="btn btn-primary" onclick="cancelAll()">Hủy</a></div></form></div></div><div class="section"></div></div></div>';
var g = document.createElement("script");
g.text = '$(\'#cart-icon\').on(\'click\', function(){$(\'#cart\').css("top", "50px"); $(\'#sp-table\').html(\'\'); for (var key in localStorage) if (key !="tongtien" && key !="cart-no"){var s=localStorage.getItem(key).split("|"); $(\'#sp-table\').append(\'<tr id="\'+key+\'-row"><td>\'+s[0]+\'</td><td>\'+s[1]+\'</td><td id="\'+key+\'-sl">\'+s[2]+\'</td><td id="\'+key+\'-tt">\'+s[3]+\'</td><td><a class="btn btn-sm btn-success" onclick="incKey(\\\'\'+key+\'\\\')">+</a> <a class="btn btn-sm btn-success" onclick="decKey(\\\'\'+key+\'\\\')">-</a> <a class="btn btn-sm btn-success" onclick="delKey(\\\'\'+key+\'\\\')">x</a></tr>\'); $(\'#tongtien\').text(Number(localStorage.getItem("tongtien")).toLocaleString("vi") + " VND");}}); $(\'#order-form\').submit(function(){$(\'#dssp\').val(JSON.stringify(localStorage)); return true;});';
document.body.appendChild(g);

if (localStorage.length>1) $('#cart-icon').removeClass("scale-out");

function SP(code, maker, name, price, des, cpu, ram, display, os, fcam, bcam, memory, sim, pin, tags)
{
    this.code = code;
    this.maker = maker;
    this.name = name;
    this.price = price;
    this.des = des;
    this.cpu = cpu;
    this.ram = ram;
    this.display = display;
    this.os = os;
    this.fcam = fcam;
    this.bcam = bcam;
    this.memory = memory;
    this.sim = sim;
    this.pin = pin;
    this.tags = tags;
}

function toLocalStorage(o)
{
        if (localStorage.getItem("tongtien") === null) localStorage.setItem("tongtien", 0);
        if (localStorage.getItem(o.code) === null)
        {
            localStorage.setItem(o.code, o.name + "|" + o.price + "|1|" + o.price);
            $('#cart-icon').removeClass("scale-out")
        }
        else
        {
            var s = localStorage.getItem(o.code).split("|");
            s[2] = Number(s[2]) + 1;
            s[3] = s[2]*o.price;
            localStorage.setItem(o.code, o.name + "|" + o.price + "|" + s[2] + "|" + s[3]);
        }
        localStorage.setItem("tongtien", Number(localStorage.getItem("tongtien")) + Number(o.price));    
}

function incKey(key)
{
    s = localStorage.getItem(key).split("|");
    s[2] = Number(s[2]) + 1;
    s[3] = s[2]*s[1];
    localStorage.setItem("tongtien", Number(localStorage.getItem("tongtien")) + Number(s[1]));
    localStorage.setItem(key, s[0] + "|" + s[1] + "|" + s[2] + "|" + s[3]);
    $("#"+key+"-sl").text(s[2]);
    $("#"+key+"-tt").text(s[3]);
    $('#tongtien').text(Number(localStorage.getItem("tongtien")).toLocaleString("vi") + " VND");
    incCartNo();
}
function decKey(key)
{
    s = localStorage.getItem(key).split("|");
    if (s[2]>1)
    {
        s[2] = Number(s[2]) - 1;
        s[3] = s[2]*s[1];
        localStorage.setItem("tongtien", Number(localStorage.getItem("tongtien")) - Number(s[1]));
        localStorage.setItem(key, s[0] + "|" + s[1] + "|" + s[2] + "|" + s[3]);
        $("#"+key+"-sl").text(s[2]);
        $("#"+key+"-tt").text(s[3]);
        $('#tongtien').text(Number(localStorage.getItem("tongtien")).toLocaleString("vi") + " VND");
        decCartNo(1);
    }
}
function delKey(key)
{
    s = localStorage.getItem(key).split("|");
    localStorage.setItem("tongtien", Number(localStorage.getItem("tongtien")) - Number(s[3]));
    localStorage.removeItem(key);
    $("#"+key+"-row").remove();
    $('#tongtien').text(Number(localStorage.getItem("tongtien")).toLocaleString("vi") + " VND");
    if (localStorage.getItem("tongtien") == 0) $("#cart-icon").addClass("scale-out");
    decCartNo(Number(s[2]));
}

function cancelAll()
{
    localStorage.clear();
    location.reload();
}

function updateCartNo(no)
{
    $('#cart-no').text(no);
    if (no == 0) $('#cart-icon').hide(); else $('#cart-icon').show();
    localStorage.setItem("cart-no", no);
}

function incCartNo()
{
    updateCartNo(Number($('#cart-no').text())+1)
}

function decCartNo(i)
{
    updateCartNo(Number($('#cart-no').text())-i)
}

if (localStorage.getItem("cart-no") === null) localStorage.setItem("cart-no", 0);
updateCartNo(localStorage.getItem("cart-no"));