<div class="col-md-12">
    <h3 style="margin-top:0px;">{{ crud.title }}<a ng-href="{{ crud.returnLink }}" class="btn btn-primary btn-sm pull-right">{{ crud.return }}</a></h3>
</div>
<div class="col-md-9">
    <div class="input-group input-group-lg">
        <span class="ng-hide input-group-btn ">
            <span class="ng-hide"></span>
        </span>
        <input
            placeholder="{{ crud.itemTitle }}"
            ng-blur="validate.blur( fields[0], item )"
            ng-focus="validate.focus( fields[0], item )"
            type="text" class="form-control"
            style="line-height:40px;font-size:25px;" ng-model="item.name">
        <span class="input-group-btn ">
            <button class="btn btn-primary" ng-disabled="submitDisabled" ng-click="submit()" type="button">{{ crud.saveBtnText }}</button>
            <span class="ng-hide"></span>
        </span>
    </div>
    <p class="help-block {{ fields[0].model }}" style="font-size:12px;">{{ fields[0].desc }}</p>
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                {{ crud.fieldsTitle }}
            </div>
        </div>
        <div class="box-body">
            <div class="row">

                <div
                    ng-repeat="field in fields"
                    class="{{ field.class !== undefined ? field.class : 'col-lg-12 col-sm-12 col-xs-12' }}"
                >

                    <div class="form-group" ng-if="field.type == 'text'">
                        <div class="input-group">
                          <span class="input-group-addon">{{ field.label }}</span>
                          <input
                            type="text"
                            class="form-control"
                            ng-blur="validate.blur( field, item )"
                            ng-focus="validate.focus( field, item )"
                            ng-model="item[ field.model ]"
                            placeholder="{{ field.placeholder }}">
                        </div>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div class="form-group" ng-if="field.type == 'textarea'">
                        <label>{{ field.label }}</label>
                        <textarea
                            ng-model="item[ field.model ]"
                            ng-blur="validate.blur( field, item )"
                            ng-blur="validate.focus( field, item )"
                            placeholder="{{ field.placeholder }}" class="form-control"></textarea>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div class="form-group" ng-if="field.type == 'select'">
                        <div class="input-group">
                            <span class="input-group-addon">{{ field.label }}</span>
                            <select
                                class="form-control"
                                ng-model="item[ field.model ]"
                                ng-blur="validate.blur( field, item )"
                                ng-blur="validate.focus( field, item )"
                                >
                                <option ng-repeat="option in field.options" value="{{ option.value }}">{{ option.label }}</option>
                            </select>
                        </div>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div class="form-group" ng-if="field.type == 'datepick'">
                        <div class="input-group" on-change="updateDate( item[ field.model ], field.model )" datetimepicker ng-model="item[ field.model ]" options="field.options">
                            <span class="input-group-addon">{{ field.label }}</span>
                            <input
                                class="form-control"
                                ng-blur="validate.blur( field, item )"
                                ng-blur="validate.focus( field, item )"
                                placeholder="{{ field.placeholder }}" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div class="form-group" ng-if="field.type == 'datetimepicker'">
                        <div class="dropup">
                            <a class="dropdown-toggle" id="dropdown" role="button" data-toggle="dropdown" data-target="#" href="#">
                                <div class="input-group">
                                    <span class="input-group-addon">{{ field.label }}</span>
                                    <input type="text" id="date" name="date" class="form-control"  ng-model="item[ field.model ]">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <datetimepicker
                                    data-before-render="field.beforeRender( $dates, $view, $leftDate, $upDate, $rightDate, variation )"
                                    data-ng-model="item[ field.model ]"
                                    data-on-set-time="field.onSet( $broadcast )"
                                    data-datetimepicker-config="{ dropdownSelector: '#dropdown' }">
                                </datetimepicker>
                            </ul>
                        </div>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div class="form-group" ng-if="field.type == 'datetime-popup'">
                        <p class="input-group">
                          <input
                            type="text"
                            class="form-control"
                            uib-datepicker-popup
                            ng-model="item[ field.model ]"
                            is-open="popup2.opened"
                            ng-required="true"
                            close-text="Close" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open2()"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>
                        </p>
                        <p class="help-block {{ field.model }}" style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>

                    <div
                        class="row"
                        ng-if="field.type == 'group'"
                        ng-init="item[ field.model ] = resetGroup( item[ field.model ] )"
                    >

                        <div
                            class="col-lg-6 col-sm-6 col-xs-12"
                            ng-repeat="(group_index,group_value) in item[ field.model ]"
                        >

                            <div class="box box-primary" style="background:#F1F1F1;" >
                                <div class="box-header with-border">
                                    <!-- .groups" -->
                                    <div class="box-title">
                                        {{ field.label }}
                                    </div>
                                    <div class="box-tools pull-right">
                                        <button ng-show="item[ field.model ].length <= groupLengthLimit" type="button" name="button" class="btn btn-sm btn-primary" ng-click="addGroup( item[ field.model ] )"><i class="fa fa-plus" ></i></button>
                                        <button ng-show="item[ field.model ].length > 1" type="button" ng-click="removeGroup( group_index, item[ field.model ] )" name="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div
                                        ng-repeat="subField in field.subFields"
                                        ng-show="subField.show( variation, item, field.subFields )"
                                    >

                                        <div class="form-group" ng-if="subField.type == 'text'">

                                            <div class="input-group">

                                              <span class="input-group-addon">{{ subField.label }}</span>

                                              <input
                                                type="text"
                                                class="form-control"
                                                ng-model="item[ field.model ][ group_index ][ subField.model ]"
                                                placeholder="{{ subField.placeholder }}"
                                                >

                                            </div>
                                            <p class="help-block" style="height:30px;font-size:12px;">{{ subField.desc }}</p>
                                        </div>

                                        <div class="form-group" ng-if="subField.type == 'select'">
                                            <div class="input-group">
                                                <span class="input-group-addon">{{ subField.label }}</span>
                                                <select class="form-control" ng-model="item[ field.model ][ group_index ][ subField.model ]">
                                                    <option ng-repeat="option in subField.options" value="{{ option.value }}">{{ option.label }}</option>
                                                </select>
                                            </div>
                                            <p class="help-block" style="height:30px;font-size:12px;">{{ subField.desc }}</p>
                                        </div>

                                        <!--  Image Select -->

                                        <div class="input-group" ng-if="subField.type == 'image_select'">
                                          <span class="input-group-addon">{{ subField.label }}</span>
                                          <input ng-model="item[ field.model ][ group_index ][ subField.model ]" type="text" class="form-control" placeholder="">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="input-group" ng-if="field.type == 'image_select'">
                      <span class="input-group-addon">{{ field.label }}</span>
                      <input
                        ng-blur="validate.focus( field, item )"
                        ng-blur="validate.blur( field, item )"
                        ng-model="item[ field.model ]"
                        type="text"
                        class="form-control"
                        placeholder="">
                      <p
                        class="help-block {{ field.model }}"
                        style="height:30px;font-size:12px;">{{ field.desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
