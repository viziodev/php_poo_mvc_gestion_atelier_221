<?php
$errors=[];
    if(Session::isset("errors")){
      $errors=Session::get("errors");
       Session::unset("errors");
    }
?><div class="container mt-5 ">
    <form class="row g-3 needs-validation" novalidate method="post" action="<?=WEB_URL?>">
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label">Libelle</label>
            <input type="text" class="form-control <?=isset($errors['libelle'])?'is-invalid':''?> "
                id="validationCustom01" name="libelle" value="">
            <div class="invalid-feedback">
                <?=$errors['libelle']??""?>
            </div>
        </div>
        <div class="col-md-3" style="margin-top: 48px;">
            <label for="validationCustom01" class="form-label "></label>
            <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>
        <input type="hidden" name="path" value="store-categorie">
    </form>
    <div class="card mt-5">

        <div class="card-body bg-white">
            <h4 class="card-title"> Liste des Categories </h4>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datas as $data):?>
                        <tr class="">
                            <td scope="row">
                                <?=$data->getId();?> </td>
                            <td> <?=$data->getLibelle();?></td>
                            <td>
                                <a name="" id="" class="btn btn-light" href="#" role="button">Edit</a>
                                <a name="" id="" class="btn btn-secondary" href="#" role="button">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>