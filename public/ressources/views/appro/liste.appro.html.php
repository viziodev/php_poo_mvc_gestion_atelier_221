<div class="container mt-5 ">
    <form class="row g-3 needs-validation" novalidate method="post" action="<?=WEB_URL?>">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Date</label>
            <input type="date" class="form-control  " id="validationCustom01" name="libelle" value="">
        </div>
        <div class="col-md-4 ">
            <label for="" class="form-label">Statut</label>
            <select class="form-select form-select-lg" name="" id="">
                <option selected>Payer</option>
                <option value="">Impayer</option>
            </select>
        </div>
        <div class="col-md-3" style="margin-top: 48px;">
            <label for="validationCustom01" class="form-label "></label>
            <button class="btn btn-primary" type="submit">OK</button>
        </div>
        <input type="hidden" name="path" value="store-categorie">
    </form>
    <div class="card mt-5">

        <div class="card-body bg-white">
            <h4 class="card-title"> Liste des Approvisionnement</h4>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Fournisseur</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datas as $data):?>
                        <tr class="">
                            <td scope="row">
                                <?=dateFr($data->dateAppro)?> </td>
                            <td> <?=$data->fournisseur;?></td>
                            <td> <?=$data->montant;?></td>
                            <td> <?=$data->formatPaiement()?></td>
                            <td>
                                <a name="" id="" class="btn btn-light" href="#" role="button">Detail</a>
                                <?php if(!$data->paiement):?>
                                <a name="" id="payement" class="btn btn-secondary" href="#" role="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-appro="<?=$data->id?>">Payer</a>
                                <?php endif?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class=" modal" tabindex="-1" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="post" action="<?=WEB_URL?>">
                    <input id="id_appro" type="hidden" name="id_appro" value="0">
                    <input type="hidden" name="path" value="update-paiement-appro">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=asset("js/script.js")?>"></script>