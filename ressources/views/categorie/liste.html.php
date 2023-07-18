<div class="container mt-5 ">
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