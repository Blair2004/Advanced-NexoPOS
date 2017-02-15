<div ng-controller="items">
    <div class="row">
        <div class="col-md-12">
            <h3 style="margin-top:0px;"><?php echo __( 'Créer un nouveau produit', 'nexo' );?><a href="<?php echo site_url([ 'dashboard', 'nexopos', 'items', 'types' ] );?>" class="btn btn-primary btn-sm pull-right"><?php echo __( 'Changer de type', 'nexo' );?></a></h3>
        </div>
        <div class="col-md-9">
            <div class="input-group input-group-lg">
                <span class="ng-hide input-group-btn ">
                    <span class="ng-hide"></span>
                </span>
                <input placeholder="<?php echo __( 'Nom du produit', 'nexo' );?>" type="text" class="form-control" style="line-height:40px;font-size:25px;" ng-model="item.name">
                <span class="input-group-btn ">
                    <button class="btn btn-primary" type="button"><?php echo __( 'Enregistrer', 'nexo' );?></button>
                    <span class="ng-hide"></span>
                </span>
            </div>
            <br>
            <item-variation></item-variation>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">
                        <span><?php echo __( 'General', 'nexo' );?></span>
                    </div>
                    <div class="box-tools pull-right">
                        <button ng-click="" type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="input-group">
                      <span class="input-group-addon"><?php echo __( 'Livraisons', 'nexo' );?></span>
                      <select ng-model="item.delivery" class="form-control" ng-options="option as option.TITRE for option in deliveries track by option.ID">
                      </select>
                      <span class="input-group-btn">
                        <button ng-click="selectType( 'deliveries/add' )" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                      </span>
                    </div>
                    <span><?php _e( 'Sélectionnez la collection à partir de laquelle le produit entre en stock.', 'nexo' );?></span>
                    <br><br>
                    <div class="input-group">
                      <span class="input-group-addon"><?php echo __( 'Catégorie', 'nexo' );?></span>
                      <select ng-model="item.category" class="form-control" placeholder="" ng-options="option as option.NOM for option in categories track by option.ID">
                      </select>
                      <span class="input-group-btn">
                        <button ng-click="selectType( 'create/category' )" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                      </span>
                    </div>
                    <span><?php _e( 'Permet d\'assigner une catégorie à un produit', 'nexo' );?></span>
                    <br><br>
                    <div class="input-group">
                      <span class="input-group-addon"><?php echo __( 'Unité', 'nexo' );?></span>
                      <select ng-model="item.status" class="form-control" placeholder="" ng-options="option as option.label for option in YesNoOptions track by option.value">
                      </select>
                      <span class="input-group-btn">
                        <button ng-click="selectType( 'create/unit' )" class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                      </span>
                    </div>
                    <span><?php _e( 'Permet d\'assigner une unité de mesure à ce produit.', 'nexo' );?></span>
                    <br><br>

                    <div class="input-group">
                      <span class="input-group-addon"><?php echo __( 'Statut', 'nexo' );?></span>
                      <select ng-model="item.status" class="form-control" placeholder="" ng-options="option as option.label for option in YesNoOptions track by option.value">
                      </select>
                    </div>
                    <span><?php _e( 'Permet de déterminer si oui ou non un produit est disponible pour la vente', 'nexo' );?></span>
                    <br><br>
                    <span><?php echo __( 'Vous permet d\'ajouter plusieurs variations', 'nexo' );?></span>
                </div>
            </div>
        </div>
    </div>

</div>
