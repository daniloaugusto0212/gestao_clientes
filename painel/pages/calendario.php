<?php
    $mes = date('m',time());
    $ano = date('Y',time());

    if ($mes > 12) {
        $mes = 12;
    }
    if ($mes < 1) {
        $mes = 1;
    }

    $numeroDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);    
    $diaInicialdoMes = date('N', strtotime("$ano-$mes-01"));
    $diaDeHoje = date('d',time());
    $diaDeHoje = "$ano-$mes-$diaDeHoje";    
      
?>
<div class="box-content">
    <h2><i class="far fa-calendar"></i> Calendário e Agenda</h2>

    <table class="calendario-table" >
        <tr>
            <td>Domingo</td>
            <td>Segunda</td>
            <td>Terça</td>            
            <td>Quarta</td>
            <td>Quinta</td>
            <td>Sexta</td>
            <td>Sábado</td>
        </tr>

        <?php
            $n = 1;
            $z = 0;
            $numeroDias+=$diaInicialdoMes;
            while ($n <= $numeroDias) {
                if ($diaInicialdoMes == 7 && $z != $diaInicialdoMes) {
                    $z = 7;
                    $n = 8;
                }
                if ($n % 7 == 1) {
                    echo '<tr>';
                }
                if ($z >= $diaInicialdoMes) {
                    $dia = $n - $diaInicialdoMes;
                    $atual = "$ano-$mes-$dia";
                    if($atual != $diaDeHoje){
                        echo "<td>$dia</td>";
                    }else{
                        echo '<td class="day-selected">'.$dia.'</td>';
                    }
                }else{
                    echo "<td></td>";
                    $z++;
                }
                if ($n % 7 == 0) {
                    echo '</tr>';
                }
                $n++;
            }
        ?>
    </table>

    <form action="" method="post">
    <div class="card-title">Adicionar tarefa para <?php echo date('d/m/Y',time()) ?></div>
        <input type="text" name="tarefa">
        <input type="hidden" name="data" value="2017-09-01">
        <input type="submit" value="Cadastrar!">
    </form>

    <div class="box-tarefas">
        <div class="card-title">Tarefas de 19/09/2019</div>
        
        <?php
            for ($i=0; $i < 6; $i++) { 
                
        ?>
        <div class="box-tarefas-single">
                <h2><i class="fas fa-rocket"></i> Ir ao médico</h2>
        </div><!--box-tarefas-single-->
        <?php } ?>
        <div class="clear"></div>
    </div><!--box-taefas-->
    

 </div>   
    