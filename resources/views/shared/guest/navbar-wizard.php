<?php
$hybridauth = include(VIEWSDIR . 'config' . DIRECTORY_SEPARATOR . 'hybridauthlib.php');?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
    <ul id="login-dp" class="dropdown-menu">
        <li>
            <div class="row">
                <div class="col-md-12">
                    Login via
                    <div class="social-buttons">
                    <?php foreach ($providers as $provider_key => $settings): ?>
                    <? if(array_key_exists($provider_key, $hybridauth)) {
                            $provider = $hybridauth[$provider_key];
                            $provider['label'] = (empty($provider['label']) ? $provider_key : $provider['label']);
                            $provider['font_awesome'] = (empty($provider['font_awesome']) ? '' : $provider['font_awesome']);
                            $provider['btn_class'] = (empty($provider['btn_class']) ? 'btn-' . strtolower($provider_key) : $provider['btn_class']);
                        } else {
                            $provider = array(
                                'label' => $provider_key,
                                'font_awesome' => '',
                                'btn_class' => 'btn-' . strtolower($provider_key)
                                );
                        }
                    ?>
                        <a href="<?=base_url(config_item('hybridauth_login_route_prefix') . $provider_key)?>" class="btn <?=$provider['btn_class']?>"><i class="fa <?=$provider['font_awesome']?>"></i> <?=$provider['label']?></a>
                    <?php endforeach ?>
                    </div>
                    or
                    <?=form_open($auth_route . "/login");?>
                        <div class="form-group">
                            <label for="indentity"><?=lang('login_identity_label');?></label>
                            <input type="text" name="identity" class="form-control" placeholder="<?=lang('login_identity_label');?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="<?=lang('login_password_label')?>" required>
                            <div class="help-block text-right"><a href="<?=site_url($auth_route .'/forgot_password/')?>">Forget the password ?</a></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> keep me logged-in
                            </label>
                        </div>
                    </form>
                </div>
                <div class="bottom text-center">
                    New here ? <a href="#"><b>Join Us</b></a>
                </div>
            </div>
        </li>
    </ul>
</li>
