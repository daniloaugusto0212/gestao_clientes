$(function () {
    //Arquivo pai do sistema
    $('[name=preco_max], [name=preco_min]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
})