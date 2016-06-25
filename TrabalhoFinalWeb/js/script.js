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
    var tipoProduto = document.getElementById('tipoProduto');
    if (!tipoProduto)
        return;
    var itemSelecionado = tipoProduto.options[tipoProduto.selectedIndex].value;
    document.cookie="tp_prd=" + itemSelecionado + " expires=Thu, 13 Mai 2014 12:00:00 GMT";
})();

home = (function() {
	var itens = 2;

	var box = document.querySelector('#carousel');
	if (!box)
            return;

	var ChkItem = 1;
	formataItem(ChkItem);

	setInterval(function() {
		trocaItem();
	}, 9000);

	function trocaItem() {
		if (ChkItem >= itens) {
			ChkItem = 1;
		} else {
			ChkItem++;
		}
		formataItem(ChkItem);
	}

	function formataItem(n) {
		for (var i = 0; i < 9; i++) {
			setTimeout(function() {
				box.style.backgroundColor = "rgba(58, 74, 149, 0." + i + ")";
			}, 500);
		}
		box.style.backgroundImage = "url('../../img/carousel/promo" + n
				+ ".jpg')";
		for (var i = 0; i < itens; i++) {
			if (box.children[i].tagName === "DIV") {
				box.children[i].style.backgroundColor = "#3A4A95";
			}
		}
		box.querySelector('#tag' + n).style.backgroundColor = "#CCC";
		for (var i = 9; i > 0; i--) {
			setTimeout(function() {
				box.style.backgroundColor = "rgba(58, 74, 149, 0." + i + ")";
			}, 500);
		}
	}
})();