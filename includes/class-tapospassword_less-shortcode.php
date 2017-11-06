<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       tutexp.com
 * @since      1.0.0
 *
 * @package    Tapospassword_less
 * @subpackage Tapospassword_less/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Tapospassword_less
 * @subpackage Tapospassword_less/includes
 * @author     tapos <tapos.aa@gmail.com>
 */
class Tapospassword_less_ShortCode
{


    /**
     * Tapospassword_less_ShortCode constructor.
     */
//    public function __construct()
//    {
//        $this->formDisplayShortCode();
//    }

    public function formDisplayShortCode()
    {
        function tutexp_form_creation($atts)
        {
            ?>
            <div class="tutexpForm">
                <div class="form">
                    <ul class="tab-group mytabls">
                        <li class="tab active"><a href="#signup">Phone</a></li>
                        <li class="tab"><a href="#login">Email</a></li>
                    </ul>
                    <form  method="post" id="form">
                        <?php wp_nonce_field('state','state'); ?>
                    </form>
                    <div class="tab-content">
                        <div id="signup">
                            <h1>Account Kit</h1>
                            <div>
                                <div class="top-row">
                                    <div class="field-wrap">
                                        <label>
                                            &nbsp; Country Code<span class="req">*</span>
                                        </label>
                                        <input type="text" id="country" value="+" required autocomplete="off"/>
                                    </div>
                                    <div class="field-wrap">
                                        <label>
                                            Number<span class="req">*</span>
                                        </label>
                                        <input type="text" id="phone" required autocomplete="off"/>
                                    </div>
                                </div>
                                <button  class="button button-block smsLogin"/>
                                Send</button>
                            </div>
                        </div>
                        <div id="login">
                            <h1>Account Kit</h1>
                            <div>
                                <div class="field-wrap">
                                    <label>
                                        Email Address<span class="req">*</span>
                                    </label>
                                    <input type="email" id="email" required autocomplete="off"/>
                                </div>
                                <button type="submit" class="button button-block emailLogin" />
                                Log In</button>
                            </div>
                        </div>
                    </div>
                    <!-- tab-content -->
                </div>
                <!-- /form -->
            </div>

            <?php
        }

        add_shortcode('tutexp_form', 'tutexp_form_creation');
    }
}