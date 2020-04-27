$(function(){
    
    $('textarea').keyup(function(e){
        var code = e.keyCode || e.which
        if (code == 13) {
            insertChat()
        }
    })

    $('form').submit(function(){
        insertChat()
        return false
    })

    function insertChat(){
        //Função responsável por inserir as mensagens.
        $('textarea').val('')
    }

    function recuperarMensagens() {
        //Recuperar mensagens novas do banco de dados.
        console.log('recuperando')
    }
    
    setInterval(function(){
        recuperarMensagens()
    },3000) 
})