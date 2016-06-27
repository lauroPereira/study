var now = new Date;
dayName = new Array ("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
monName = new Array ("Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Aug", "Oct", "Nov", "Dec");

function setCookie(name, val){
   var texto =  name + "=" + 
                val + "; " + 
                "expires=" + dayName[now.getDay() + 1] + ", " + 
                             (now.getDate() + 1) + " " +
                             monName[now.getMonth() ] + " " +
                             now.getFullYear () + " " +
                             addZero(now.getHours()) + ":" +
                             addZero(now.getMinutes()) + ":" +
                             addZero(now.getSeconds()) + " GMT";
     document.cookie = texto;
}

function getCookie(name) {
    var cookies = document.cookie;
    var nome = name + "=";
    var pos = cookies.indexOf("; " + nome);
 
    if (pos === -1) {
 
        pos = cookies.indexOf(nome);
         
        if (pos !== 0) {
            return null;
        }
 
    } else {
        pos += 2;
    }
 
    var fim = cookies.indexOf(";", pos);
     
    if (fim === -1) {
        fim = cookies.length;                        
    }
 
    return unescape(cookies.substring(pos + nome.length, fim));
}

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function ajustaTamanho(obj){
    
    var x = document.body.scrollWidth || document.body.offsetWidth;
    var y = document.body.scrollHeight || document.body.offsetHeight;
    
    obj.style.width  = x + 'px';
    obj.style.height = y + 'px';
};

function darkerShow(){
    var darker = document.getElementById('darker');
    ajustaTamanho(darker);
    if(darker.className === "darker_disabled"){
        darker.className ="darker_enabled";
    }else{
        darker.className ="darker_disabled";
    }
}

function darkerHide(){
    var darker = document.getElementById('darker');
    ajustaTamanho(darker);
    if(darker.className === "darker_enabled"){
        darker.className ="darker_disabled";
    }else{
        darker.className ="darker_enabled";
    }
}

produto = (function(){
    
    var tipoProduto = document.getElementById('slTipoProduto');
    var btNomeProduto = document.getElementById('btProduto');
    var nomeProduto = document.getElementById('nmProduto');
    
    if (!tipoProduto){
        return;
    }else{
        nomeProduto.focus();
    }
    
    var item = getCookie("tp_prd");
    var nome = getCookie("ds_prd");
    
    nomeProduto.value = nome;
    tipoProduto.selectedIndex = item;
    
    
    
    nomeProduto.addEventListener("keypress", function(){
        if (event.keyCode === 13) {
            if(nomeProduto.value !== ''){
                setCookie("ds_prd", nomeProduto.value );
            }else{
                setCookie("ds_prd", '' );
            }
            window.location.reload();
        }
    });
    
    btNomeProduto.addEventListener("click", function(){
        if(nomeProduto.value !== ''){
            setCookie("ds_prd", nomeProduto.value );
        }else{
            setCookie("ds_prd", '' );
        }
        window.location.reload();
    });
    
    tipoProduto.addEventListener("change", function(){
        var itemSelecionado = tipoProduto.options[tipoProduto.selectedIndex].value;
        if(itemSelecionado > 0)
            setCookie("tp_prd", itemSelecionado);
        window.location.reload();
    });
})();

home = (function() {
    var box = document.querySelector('#carousel');
    if (!box)
        return;

    var ret = getCookie('imgs');
    var img = ret.split(',');
    var itens = img.length - 1;
    var ChkItem = 0;
	
    formataItem(ChkItem);

    setInterval(function() {
            trocaItem();
    }, 9000);

    function trocaItem() {
            if (ChkItem >= itens) {
                    ChkItem = 0;
            } else {
                    ChkItem++;
            }
            formataItem(ChkItem);
    }

    function formataItem(n) {
        box.style.backgroundImage = img[n];
        for (var i = 0; i <= itens; i++) {
                if (box.children[i].tagName === "DIV") {
                        box.children[i].style.backgroundColor = "#3A4A95";
                }
        }
        box.querySelector('#tag' + n).style.backgroundColor = "#CCC";
    }
})();