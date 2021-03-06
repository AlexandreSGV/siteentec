<!-- src/Template/Users/add.ctp -->
<?= $this->assign('title', 'Inscrições'); ?>
<div class="container section"
    style="width: 70%; padding-top: 89px; margin-bottom: 10px;" id="insc">
    <?= $this->Flash->render()?>
    <h2>Inscrição:</h2>
    <div class="users form">
        <span>Atenção, os campos marcados com o * asterísco são obrigatórios, os demais opcionais. </span>
        <?= $this->Form->create($user,array('class' => 'form-group'))?>
        <fieldset>
            <legend>Dados pessoais: </legend>
            <?= $this->Form->input('nome', array('class' => 'form-control'))?>

            <div class="my-form-inline">
                <div style="min-width: 210px; width: 30%;">
                    <?=$this->Form->input ( 'sexo', array ('options' => [ 'empty' => 'Selecione','Feminino' => 'Feminino' , 'Masculino' => 'Masculino'] ))?>
                </div>
                <div style="min-width: 280px; width: 40%;">
                    <?=$this->Form->input ( 'nascimento', array ('label' => 'Date de Nascimento: (Dia/Mês/Ano) ','dateFormat' => 'DMY','minYear' => date ( 'Y' ) -90,'maxYear' => date ( 'Y' ) - 10,'class' => 'form-control','monthNames' => [ '01' => 'Janeiro','02' => 'Fevereiro','03' => 'Março','04' => 'Abril','05' => 'Maio','06' => 'Junho','07' => 'Julho','08' => 'Agosto','09' => 'Setembro','10' => 'Outubro','11' => 'Novembro','12' => 'Dezembro' ] ) )?>
                </div>
                <div style="min-width: 210px; width: 30%;">
                    <?= $this->Form->input('telefone', array('class' => 'form-control'))?>
                </div>
            </div>

            <?=$this->Form->input ( 'email', array ('class' => 'form-control','id' => 'email' ) )?>

            <div class="my-form-inline">
                <div style="min-width: 180px; width: 35%;">
                    <?= $this->Form->input('password', array('label' => 'Senha', 'class' => 'form-control'))?>
                </div>
                <div style="min-width: 180px; width: 35%;">
                    <?= $this->Form->input('confirm_password',array('label' => 'Confirmar Senha', 'type'  =>  'password','class' => 'form-control'))?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Endereço: </legend>

            <div class="my-form-inline">
                <div style="min-width: 140px; width: 21%;">
                   <?= $this->Form->input('cep', array('class' => 'form-control'))?>
                </div>
                <div style="min-width: 180px; width: 25%;">
                    <?=
                        $this->Form->input('estado',
                            array('options' => [
                                'empty' => 'Selecione',
                                'AC' => 'Acre',
                                'AL' => 'Alagoas',
                                'AP' => 'Amapá',
                                'AM' => 'Amazonas',
                                'BA' => 'Bahia',
                                'CE' => 'Ceará',
                                'DF' => 'Distrito Federal',
                                'ES' => 'Espírito Santo',
                                'GO' => 'Goiás',
                                'MA' => 'Maranhão',
                                'MT' => 'Mato Grosso',
                                'MS' => 'Mato Grosso do Sul',
                                'MG' => 'Minas Gerais',
                                'PA' => 'Pará',
                                'PB' => 'Paraíba',
                                'PR' => 'Paraná',
                                'PE' => 'Pernambuco',
                                'PI' => 'Piauí',
                                'RJ' => 'Rio de Janeiro',
                                'RN' => 'Rio Grande do Norte',
                                'RS' => 'Rio Grande do Sul',
                                'RO' => 'Rondônia',
                                'RR' => 'Roraima',
                                'SC' => 'Santa Catarina',
                                'SP' => 'São Paulo',
                                'SE' => 'Sergipe',
                                'TO' => 'Tocantins',
                            ])
                        )
                    ?>
                </div>
                <div style="min-width: 160px; width: 22%;">
                    <?= $this->Form->input('cidade', array('class' => 'form-control'))?>
                </div>
                <div style="min-width: 160px; width: 22%;">
                    <?= $this->Form->input('bairro', array('class' => 'form-control'))?>
                </div>
            </div>
            <div class="my-form-inline">
                <div style="width: 350px; width: 65%; max-width: 100%">
                    <?= $this->Form->input('logradouro', array('label' => "Nome da Rua", 'class' => 'form-control'))?>
                </div>
                <div style="min-width: 100px; width: 17%;">
                    <?= $this->Form->input('numero', array('label' => "Número",'class' => 'form-control'))?>
                </div>
                <div style="min-width: 100px; width: 17%;">
                    <?= $this->Form->input('complemento', array('class' => 'form-control'))?>
                </div>
            </div>
        </fieldset>


        <fieldset>
            <legend>Formação e Informações Profissionais: </legend>
            <div class="my-form-inline">
                <div style="min-width: 210px; width: 23%;">
                    <?=$this->Form->input ( 'instrucao', array ('label' => 'Grau de Instrução: ','options' => [ 'empty' => 'Selecione','Fundamental Incompleto' => 'Fundamental Incompleto' , 'Fundamental Completo' => 'Fundamental Completo' , 'Médio Incompleto' => 'Médio Incompleto' , 'Médio Completo' => 'Médio Completo' , 'Técnico Incompleto' => 'Técnico Incompleto' , 'Técnico Completo' => 'Técnico Completo' , 'Superior Incompleto' => 'Superior Incompleto' , 'Superior Completo' => 'Superior Completo' , 'Mestrado Incompleto' => 'Mestrado Incompleto' , 'Mestrado Completo' => 'Mestrado Completo' , 'Doutorado Incompleto' => 'Doutorado Incompleto' , 'Doutorado Completo' => 'Doutorado Completo' ] ) )?>
                </div>
                <div style="min-width: 240px; width: 67%;">
                    <?= $this->Form->input('instituicao', array('label' => 'Instituição de Ensino ou Empresa: ','class' => 'form-control'))?>
                </div>
            </div>
        </fieldset>

        <?= $this->Form->button(__('<i class="fa fa-paper-plane-o"></i> ENVIAR'), ['class'=>'form-control', 'escape' => false]); ?>
        <?= $this->Form->end()?>
    </div>
</div>

<script>
    $('#cep').on('change', function() {
        var cep = $(this).val().replace(/-/g, '')
        if (cep.length == 8) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json';
            $.getJSON(url, function(data) {
                if (!data.erro) {
                    $('#estado').val(data.uf);
                    $('#cidade').val(data.localidade);
                    $('#bairro').val(data.bairro);
                    $('#logradouro').val(data.logradouro);
                }
            });
        }

    });
</script>