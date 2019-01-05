<?php

$document = JFactory::getDocument();
function dateFormatation($date)
{
    $date = explode('-', $date);
    return $date[2] . '/' . $date[1] . '/' . $date[0];
}

function removeHour($hour)
{
    return substr($hour, 0, 5);
}
$id = '';
foreach ($this->inscrever as $inscrever) {
    $id = $inscrever->id;
    $name = $inscrever->name;
}

if(!empty($id)):
?>
<jdoc:include type="message" />
<div class="inscrever">
    <div class="well">
        <div class="row-fluid form-horizontal">
            <label class="control-label span2">Inscreva-se no evento:</label>
            <div class="span10">
                <h1><?php echo $name; ?></h1>
            </div>
        </div>
    </div>

    <div id="form-inscrever">
        <form action="<?php echo JRoute::_('index.php?option=com_doings&task=doings.insert'); ?>" id="inscrever" method="post" class="row-fluid form-validate form-horizontal">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="control-group">
                <div class="span12">
                    <input type="text" name="name" id="name" class="span12 required" placeholder="Nome" required="required" aria-required="true">
                </div>
            </div>
            <div class="control-group">
                <div class="span12">
                    <input type="email" name="email" id="email" class="span12 required" placeholder="E-mail" required="required" aria-required="true">
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group span4">
                    <input type="text" name="cpf" id="cpf" class="span12 required" placeholder="CPF" required="required" aria-required="true">
                </div>
                <div class="control-group span4">
                    <input type="text" name="rg" id="rg" class="span12 required" placeholder="Identidade(RG)" required="required" aria-required="true" maxlength="14">
                </div>
                <div class="control-group span4">
                    <input type="text" name="date_birth" id="date_birth" class="span12 required" placeholder="Data de Nascimento" required="required" aria-required="true">
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group span6">
                    <label class="span4 control-label">Escolaridade:</label>
                    <select name="schooling" id="schooling" class="span8"  required="required">
                        <option value="1º Grau">1º Grau</option>
                        <option value="2º Grau">2º Grau</option>
                        <option value="Doutorado">Doutorado</option>
                        <option value="Mestrado">Mestrado</option>
                        <option value="Pós-Graduação">Pós-Graduação</option>
                        <option value="Superior">Superior</option>
                    </select>
                </div>
                <div class="control-group span6">
                    <ul class="inline gender">
                        <li>
                            <label class="control-label">Sexo:</label>
                        </li>
                        <li>
                            <label for="masculino">
                                <input type="radio" name="gender" id="masculino" value="masculino" required="required"> Masculino
                            </label>
                        </li>
                        <li>
                            <label for="feminino">
                                <input type="radio" name="gender" id="feminino" value="feminino"> Feminino
                            </label>
                        </li>
                        <li>
                            <label for="outro">
                                <input type="radio" name="gender" id="outro" value="outro"> Outro
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group span10">
                    <input type="text" name="address" id="address" class="span12 required" placeholder="Endereço" required="required" aria-required="true">
                </div>
                <div class="control-group span2">
                    <input type="text" name="number" id="number" class="span12 required" placeholder="Número" required="required" aria-required="true">
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group span3">
                    <input type="text" name="complement" id="complement" class="span12" placeholder="Complemento">
                </div>
                <div class="control-group span3">
                    <input type="text" name="district" id="district" class="span12 required" placeholder="Bairro" required="required" aria-required="true">
                </div>
                <div class="control-group span3">
                    <input type="text" name="city" id="city" class="span12 required" placeholder="Cidade" required="required" aria-required="true">
                </div>
                <div class="control-group span3">
                    <label class="span4">Estado:</label>
                    <select name="state" id="state" class="span8" required="required">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="control-group span6">
                    <input type="text" name="postal_code" id="postal_code" class="span12 required" placeholder="CEP" required="required" aria-required="true">
                </div>
                <div class="control-group span6">
                    <input type="text" name="phone" id="phone" class="span12 required" placeholder="Telefone" required="required" aria-required="true">
                </div>
            </div>
            <div class="control-group">
                <div class="span12">
                    <input type="submit" value="Inscrever" class="btn">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    jQuery(function ($) {
        $(window).on('resize', function () {

            $('.evento-img').each(function () {
                $(this).height($(this).width() * 0.75);
            });

        }).trigger('resize');
    });
</script>
<?php
else:
header("location: ". JRoute::_('index.php?option=com_doings'));
endif;
?>

