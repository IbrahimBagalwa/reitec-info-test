<div class="container-fluid p-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Nouveau bon de commande
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="refresh" data-toggle="tooltip" title="Refresh">   
                            <i class="fa fa-refresh"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="collapse">   
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pad">
                    <div class="row ui-container">
                        <div class="col-sm-12 py-2">
                            <div class="btn-group">
                                <button class="btn btn-default btn-new">
                                    <span class="fa fa-plus"></span>
                                    <span>Nouveau bon de commande</span>
                                </button>
                                <button class="btn btn-primary btn-save">
                                    <span class="fa fa-arrow-down"></span>
                                    <span>Enregistrer </span>
                                </button>
                                <button class="btn btn-default disabled btn-progress d-none">
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    <span>chargement...</span>
                                </button>
                                <button class="btn btn-default d-none re-new" data-card-widget="refresh" data-toggle="tooltip" title="Refresh">
                                    <span class="fa fa-plus"></span>
                                    <span>Nouveau</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 py-2 d-none ui-1">
                            <table class="table table-stripped table-bordered text-center py-0 my-0">
                                <thead>
                                    <tr>
                                        <th><span class="font-weight-bold fa fa-hashtag"></span></th>
                                        <th>Point de vente</th>
                                        <th>Fournisseur</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-25">
                                            <input type="text" placeholder="GOM-" value="" name="indetifylot" class="form-control font-weight-bold text-center" readonly>
                                        </td>
                                        <td>
                                            <select name="posaccess" id="posaccess" class="form-control">
                                                <option value="all">Tous</option>
                                                <?php 
                                                    $po = listOfPOS($g);
                                                    if($po !== 0){
                                                        if(count($po) > 0){
                                                            foreach ($po as $vl) {
                                                ?>
                                                    <option value="<?php echo($vl->email) ?>">
                                                        <?php echo(ucfirst($vl->name_1).'&nbsp;'.ucfirst($vl->name_2)) ?>
                                                    </option>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="provider" id="provider" class="form-control disabled">
                                                <option value="all">Tous</option>
                                                <!-- <option value="num">David maene</option> -->
                                            </select>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-default" data-card-widget="refresh">
                                                    <span class="fa fa-refresh"></span>
                                                </button>
                                                <button class="btn btn-primary new-line">
                                                    <span class="fa fa-plus"></span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card d-none ui-2">
                <!-- <div class="card-header">
                    <div class="card-title"></div>
                </div> -->
                <div class="card-body">
                    <div class="col-lg-12 py-2 bg-def">
                        <table class="table table-striped py-0 my-0 table-bordered">
                            <thead>
                                <tr>
                                    <th>N<sup>0</sup></th>
                                    <th>Article</th>
                                    <th>CodeBar</th>
                                    <th>Prix unitaire</th>
                                    <th>Qt&eacute;</th>
                                    <th>Prix total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-article" class="py-0 my-0">
                                <tr data-index-tr='1'>
                                    <td><b class="form-control border-0 font-weight-bold">1</b></td>
                                    <td class="w-15">
                                        <select name="article_1" id="article_1" evt-art="evt-gt-code" class="form-control">
                                        </select>
                                    </td>
                                    <td><span id="codebar_1" class="form-control py-1 border-0 text-center"></span></td>
                                    <td>
                                        <input type="text" class="form-control text-center" maxlength="7" name="price_1" id="price_1"  placeholder="ex: 200.2">
                                    </td>
                                    <td>
                                        <input type="number" name="qte_1" id="qte_1" min="1" class="form-control text-center">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" id="tprice_1" readonly class="form-control text-center">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <b>USD&nbsp;</b>
                                                    <i class="fa fa-dollar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm btn-rmv" line-index-rmv="btn-line-1" btn-action="rmvln" data-toggle="tooltip" title="Supp la ligne">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                            <button class="btn btn-primary btn-sm btn-new-line" line-index-add="btn-line-1" btn-action="addln" data-toggle="tooltip" title="nouvelle ligne">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr data-index-tr='1'>
                                    <td><b class="form-control border-0 font-weight-bold">1</b></td>
                                    <td class="w-15">
                                        <select name="article_1" id="article_1" class="form-control">
                                            <option value="">Selectionner</option>
                                            <option value="article">Article 1</option>
                                            <option value="bic">Article 2</option>
                                            <option value="bo">Article 3</option>
                                            <option value="a">Article 4</option>
                                        </select>
                                    </td>
                                    <td><span id="codebar_1" class="form-control py-1 border-0 text-center"></span></td>
                                    <td>
                                        <input type="text" class="form-control" name="price_1" id="price_1">
                                    </td>
                                    <td>
                                        <input type="number" name="qte_1" id="qte_1" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" id="tprice_1" readonly class="form-control">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-rmv" line-index="btn-line-2" btn-action="rmvln" data-toggle="tooltip" title="Supp la ligne">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                            <button class="btn btn-primary btn-new-line" line-index="btn-line-2" btn-action="addln" data-toggle="tooltip" title="nouvelle ligne">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>N<sup>0</sup></th>
                                    <th>Article</th>
                                    <th>CodeBar</th>
                                    <th>Prix unitaire</th>
                                    <th>Qt&eacute;</th>
                                    <th>Prix total</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="my-2 row">
                            <div class="btn-group col-sm-6 col-6">
                                <button class="btn btn-primary btn-sm btn-to-print">
                                    <span class="fa fa-arrow-down"></span>
                                    Générer les codes bars et enregister le <b>pdf</b>
                                </button>
                                <!-- <button class="btn btn-danger btn-sm" data-card-widget="refresh">
                                    <span class="fa fa-undo"></span>
                                    Reinitialiser ce formulaire
                                </button> -->
                            </div>
                            <div class="col-sm-3">
                                <b class="wrning-sms d-none text-warning"> <span class="fa fa-warning mr-2"></span>Veiller finaliser l'enregistrement</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="viva-box-scripts/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function(){
        var indet = 'art';
        var unsaved = true;
        const getArticles = function(indx){
            var op = document.createElement('option');
            $(op).attr({'value':'','id':'val-0'}).html('selectionner');
            const slct = $('#article_'+indx);
            const xhr = new XMLHttpRequest();
                xhr.open('GET', 'viva-box-scripts/php/reqxhr.php?abc='+(indet), true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        if(xhr.responseText !== ''){
                            let p = JSON.parse(xhr.responseText);
                            $(slct).append(op)
                            p.forEach(object => {
                                for (const key in object) {
                                    if (Object.hasOwnProperty.call(object, key)) {
                                        const element = object[key];
                                        const opts = document.createElement('option');
                                        $(opts).attr({'value':element,'id':'val-' + key}).html(element);
                                        $(slct).append(opts);
                                    }
                                }
                            });
                        }
                    }
                }
                xhr.send(null);
        }
        // ----------
        const randomNumber = function(len){
            len = (!isNaN(len)) ? len : 1;
            var num = [];
            for (i = 0; i < len; i++) {
                num.push(Math.floor(Math.random() * 10));
            }
            return num.join('');
        }
        // ---------
        const formPrint = function(i){
            const idLot = $('[name=indetifylot]').val();
            const art = $('[name=article_'+i+']').val();
            var a_1 = art.substring(0,1);
            a_1 = a_1.toUpperCase();
            var a_2 = art.substring(1,2);
            a_2 = a_2.toUpperCase();
            var a_3 = art.substring((art.length-1));
            a_3 = a_3.toUpperCase();
            var code = idLot.concat(a_1);
            code = code.concat(a_2);
            code = code.concat(a_3);
            code = code.concat('243');

            return code;
        }
        // ----------
        function _onRetrieveCodeBar(i){
            if($('[name=article_'+i+']').val() !== ''){
                const idLot = $('[name=indetifylot]').val();
                const art = $('[name=article_'+i+']').val();
                var a_1 = art.substring(0,1);
                a_1 = a_1.toUpperCase();
                var a_2 = art.substring(1,2);
                a_2 = a_2.toUpperCase();
                var a_3 = art.substring((art.length-1));
                a_3 = a_3.toUpperCase();
                var code = idLot.concat(a_1);
                code = code.concat(a_2);
                code = code.concat(a_3);
                code = code.concat('243')
                // console.log(code);
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'services/generateBarcode/generate.php?code='+(code), true);
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        $('[name=article_'+i+']').removeClass('border-danger');
                        $('[id=codebar_'+i+']').html(xhr.responseText);
                        // console.log(xhr.responseText)
                    }
                }
                xhr.send(null);
            }else  $('[id=codebar_'+i+']').html('<span class="fa fa-warning font-weight-bold text-danger"></span>');
        }
        // ----------
        function _sortLineTbody(){
            console.dir($('#tbody-article').find('tr').length);
        }
        // -----------
        function _canAddNewLine(idx){
            if($('[name=article_'+idx+']').val() !== ''){
                $('[name=article_'+idx+']').removeClass('border-danger');
                if($('[name=price_'+idx+']').val().length && !isNaN($('[name=price_'+idx+']').val())){
                    $('[name=price_'+idx+']').removeClass('border-danger');
                    if($('[name=qte_'+idx+']').val().length && !isNaN($('[name=qte_'+idx+']').val())){
                        $('[name=qte_'+idx+']').removeClass('border-danger');
                        return true;
                    }else $('[name=qte_'+idx+']').addClass('border-danger');
                }else $('[name=price_'+idx+']').addClass('border-danger');
            }else $('[name=article_'+idx+']').addClass('border-danger');
        }
        // -----------
        function _onAddNewLine(trg){
            const idx = trg.substring(trg.lastIndexOf('-') + 1);
            // alert('ici idx ' + idx);
            if(_canAddNewLine(idx)){
                // -----------
                let newidx = $($($('#tbody-article').find('tr')).last()).attr('data-index-tr'); 
                let prv = newidx;
                newidx = parseInt(newidx) + 1;
                // let newidx = $('#tbody-article').find('tr').length + 1;newidx = parseInt(newidx);
                // -----------
                const tr = document.createElement('tr');
                const td_1 = document.createElement('td');
                $(td_1).html('<b class="form-control border-0 font-weight-bold">'+newidx+'</b>');
                // -----------------------------------------
                const td_2 = document.createElement('td');
                const selectStr = document.createElement('select');
                $(selectStr)
                    .attr({'name':'article_'+newidx,'id':'article_'+newidx,'evt-art':'evt-gt-code','class':'form-control'})
                    .on('input', function(e){
                        const idx = $(this).attr('id');
                        _onRetrieveCodeBar(idx.substring(idx.lastIndexOf('_') + 1));
                    })
                // --------------------------------------------
                $(td_2).attr({'id':newidx,'class':'w-15'}).append(selectStr);
                // --------------------------------------------
                const td_3 = document.createElement('td');
                $(td_3).html('<span id="codebar_'+newidx+'" class="form-control py-1 text-center"></span>');
                // --------------------------------------------
                const td_4 = document.createElement('td');
                const inp1 = document.createElement('input');
                $(inp1)
                    .attr({'type':'number','name':'price_'+newidx,'id':'price_'+newidx,'min':'1','class':'form-control text-center','maxlength':'7','placeholder':'200.2'})
                    .on('blur',function(){
                        if(_canAddNewLine(idx)){
                            var v = ($(`[name=price_${newidx}]`).val() * $(`[name=qte_${newidx}]`).val());
                            document.getElementById('tprice_'+newidx).setAttribute('value',v);
                        }
                    })
                $(td_4).append(inp1)
                // --------------------------------------------
                const td_5 = document.createElement('td');
                const inp2 = document.createElement('input');
                $(inp2)
                    .attr({'type':'number','name':'qte_'+newidx,'id':'qte_'+newidx,'min':'1','class':'form-control text-center','value':'1'})
                    .on('blur',function(e){
                        if(_canAddNewLine(idx)){
                            var v = ($(`[name=price_${newidx}]`).val() * $(`[name=qte_${newidx}]`).val());
                            document.getElementById('tprice_'+newidx).setAttribute('value',v);
                            // console.log(' v -'+ v + ' value ' + $('#tprice_'+newidx).val());
                        }
                    });
                $(td_5).append(inp2);
                // --------------------------------------------
                const td_6 = document.createElement('td');
                $(td_6).html('<div class="input-group">'+
                                '<input type="text" id="tprice_'+newidx+'" readonly class="form-control text-center">'+
                                '<div class="input-group-append">'+
                                    '<span class="input-group-text">'+
                                        '<b>USD&nbsp;</b>'+
                                        '<i class="fa fa-dollar"></i>'+
                                    '</span>'+
                                '</div>'+
                            '</div>');
                // --------------------------------------------
                const td_7 = document.createElement('td');
                const btngroup = document.createElement('div');
                const btnAddLine = document.createElement('button');
                $(btnAddLine)
                    .attr(
                        {
                            'class':'btn btn-primary btn-sm btn-add',
                            'line-index-add':'btn-line-'+newidx,
                            'btn-action':'addln',
                            'data-toggle': 'tooltip',
                            'title':'Nouvelle ligne'
                        })
                    .html('<span class="fa fa-plus"></span>')
                    .on('click', function(e){
                        _onAddNewLine($(this).attr('line-index-add'));
                    })
                const btnRmvLine = document.createElement('button');
                $(btnRmvLine)
                    .attr(
                        {
                            'class':'btn btn-danger btn-sm btn-rmv',
                            'line-index-rmv':'btn-line-'+newidx,
                            'btn-action':'rmvln',
                            'data-toggle': 'tooltip',
                            'title':'Supp ligne'
                        })
                    .html('<span class="fa fa-minus"></span>')
                    .on('click', function(e){
                        _onRemoveLine($(this).attr('line-index-rmv'));
                        // $(`[line-index-add=btn-line-${position}]`).removeAttr('disabled');
                    })
                // ------------
                $(btngroup).attr({'class':'btn-group'}).append([btnRmvLine,btnAddLine]);
                $(td_7).append(btngroup);
                // ------------
                $(tr).attr({'data-index-tr': newidx}).append([td_1,td_2,td_3,td_4,td_5,td_6,td_7]);
                $('#tbody-article').append(tr);
                $(`[line-index-add=btn-line-${idx}]`).attr('disabled','disabled');
                getArticles(newidx);
                // ------------
            }
        }
        // --------------
        function _onRemoveLine(trg){
            const idx = trg.substring(trg.lastIndexOf('-') + 1);
            const L = $('#tbody-article').find('tr').length;
            if(L>1) $(`[data-index-tr=${idx}]`).remove();
            let position = $($($('#tbody-article').find('tr')).last()).attr('data-index-tr'); 
            $(`[line-index-add=btn-line-${position}]`).removeAttr('disabled');  
        }
        // --------------
        // --------------
        $('[name=indetifylot]').attr('value','GM' + randomNumber(5));
        // --------------
        $('.btn-new').on('click', function(){
            if(!document.getElementById('viva-indent-div-ui-1')){
                $('.ui-1').attr({'id':'viva-indent-div-ui-1'}).removeClass('d-none');
                $('.btn-new').attr('disabled', 'disabled');
                getArticles(1);
            }
        })
        // --------------
        $('.new-line').on('click', function(){
            if(!document.getElementById('viva-indent-div-ui-2')){
                $('.ui-2').attr({'id':'viva-indent-div-ui-2'}).removeClass('d-none');
                $('.new-line').attr('disabled','disabled');
                $(document.body).addClass('sidebar-collapse')
            }
        })
        // ---------------
        $('[data-card-widget="refresh"]').on('click', function(){
            window.location.reload();
        })
        // ---------------
        $('[evt-art=evt-gt-code]').on('input', function(e){
            const idx = $(this).attr('id');
            _onRetrieveCodeBar(idx.substring(idx.lastIndexOf('_') + 1));
        })
        $('[btn-action="rmvln"]').on('click', function(e){
            _onRemoveLine($(this).attr('line-index-rmv'));
        })
        $('[btn-action="addln"]').on('click', function(e){
            _onAddNewLine($(this).attr('line-index-add'));
        })
        $('#qte_1').on('blur',function(e){
            if(_canAddNewLine(1)){
                var v = ($(`[name=price_${1}]`).val() * $(`[name=qte_${1}]`).val());
                document.getElementById('tprice_'+1).setAttribute('value',v);
                // console.log(' v -'+ v + ' value ' + $('#tprice_'+newidx).val());
            }
        })
        $('[id=price_1]').on('blur',function(e){
            if(_canAddNewLine(1)){
                var v = ($(`[name=price_${1}]`).val() * $(`[name=qte_${1}]`).val());
                document.getElementById('tprice_'+1).setAttribute('value',v);
                // console.log(' v -'+ v + ' value ' + $('#tprice_'+newidx).val());
            }
        })
        $('.btn-to-print').on('click',function(e){
            if($('#tbody-article').find('tr').length > 0){
                const _cdTb = [];
                const tr = $('#tbody-article').find('tr');
                $.each($('#tbody-article').find('tr'), function(idx, itm){
                    // $(itm).attr('data-index-tr');
                    var pstn = parseInt($(itm).attr('data-index-tr'));
                    if(_canAddNewLine(pstn)){
                        const obj = {
                            'name': $(`[name=article_${pstn}]`).val(),
                            'code': formPrint(pstn),
                            'qte': $(`[name=qte_${pstn}]`).val()
                        }
                        _cdTb.push(obj);
                    }
                })
                if(unsaved && _cdTb.length > 0){
                    $('.wrning-sms').removeClass('d-none');
                    toastr.warning('N\'oublier pas de finaliser l\'enregistrement de ce lot');
                    setTimeout(function(){
                        toastr.warning('N\'oublier pas de finaliser l\'enregistrement de ce lot');
                        $('.wrning-sms').addClass('d-none');
                    }, 2000)
                }
                if(_cdTb.length > 0) window.location.href = (`./services/printtopdf/index.php?vox=${JSON.stringify(_cdTb)}`);
            }
        })
        $('.btn-save').on('click',function(e){
            if(document.getElementById('viva-indent-div-ui-2') && $('#tbody-article').find('tr').length > 0){
                const _cdTb = [];
                const tr = $('#tbody-article').find('tr');
                const idLot = $('[name=indetifylot]').val();
                const filterPos = $('[name=posaccess]').val();
                const provider = $('[name=provider]').val();
                $.each($('#tbody-article').find('tr'), function(idx, itm){
                    let obj = {};
                    var pstn = parseInt($(itm).attr('data-index-tr'));
                    let qte = parseInt($(`[name=qte_${pstn}]`).val());
                    if(_canAddNewLine(pstn)){
                        // _cdTb.forEach(elem => {
                        //     qte = (elem['name'] === $(`[name=article_${pstn}]`).val()) 
                        //         ? parseInt(elem['qty']) + parseInt($(`[name=qte_${pstn}]`).val()) 
                        //         : parseInt($(`[name=qte_${pstn}]`).val());
                        //     _cdTb.splice(elem);    
                        // })
                        obj = {
                                'name': $(`[name=article_${pstn}]`).val(),
                                'code': formPrint(pstn),
                                'price': $(`[name=price_${pstn}]`).val(),
                                'qty': qte
                            }
                            _cdTb.push(obj);
                    }
                })
                if(_cdTb.length > 0){
                    const _O = {
                        'lot' : idLot,
                        'provider': provider,
                        'filterPos': filterPos,
                        'items': _cdTb
                    };
                    $('.btn-progress').removeClass('d-none');
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', `viva-box-scripts/php/reqxhr.php?abc=save-art&datas=${JSON.stringify(_O)}`, true);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState === 4 && xhr.status === 200){
                            $('.btn-progress').addClass('d-none');
                            const rs = parseInt(xhr.responseText);
                            switch (rs) {
                                case 500:
                                    toastr.error('Une erreur est survenue nous n\'avons pas pu enregistrer les arcticles reessayez encore');
                                    break;
                                case 200:
                                    unsaved = false;
                                    toastr.success(`le lot : ${idLot} a été enregistrer avec sucès`);
                                    setTimeout(() => {
                                        toastr.success(`Téléchargement du fichier <b>PDF</b> des codes bares`);
                                        console.log(_O);
                                        window.location.href = (`./services/printtopdf/index.php?vox=${JSON.stringify(_O)}`);
                                    }, 350);
                                    break;
                                case 503:
                                    $('.re-new').removeClass('d-none');
                                    $('.btn-new').addClass('d-none');
                                    $(document).Toasts('create', {
                                        class: 'bg-danger m-1',
                                        body: '<strong>Tentatives d\'enregistrement</strong><br> Nous venons de detecter que ce lot a déjà été enregistrer,Appuis sur le bouton Nouveau pour recommencer l\'Opération</strong>',
                                        title: 'Admin System',
                                        subtitle: 'Enregistrement',
                                        autohide: true,
                                        delay: 4500,
                                        position: 'bottomRight',
                                        icon: 'fas fa-envelope fa-lg',
                                    });
                                    break;
                                default:
                                $(document).Toasts('create', {
                                    class: 'bg-danger m-1',
                                    body: '<strong>Tentatives d\'enregistrement</strong><br> Une erreur serveur vient de se produire, si le problème persiste contacter <strong>Admin : +243 970 284 772</strong>',
                                    title: 'Admin System',
                                    subtitle: 'Enregistrement',
                                    autohide: true,
                                    delay: 4500,
                                    position: 'bottomRight',
                                    icon: 'fas fa-envelope fa-lg',
                                });
                                console.log(xhr.responseText);
                                break;
                            }
                        }
                    }
                    xhr.send(null);
                }
            }
        })
    })
</script>