<div class="wizart-wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p>Welcome to Wizart Home - Interior Design Solutions</p>
    <p style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">Before you start integrating the visualizer, you will need to register in the PIM system (backend of the visualizer) at the following link: <a href="https://pim-admin.wizart.ai/login">PIM admin tools</a>.</p>
    <p style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">The visualizer is one system with your PIM account, so for correct operation, don’t forget to upload products in the structure that will be described <a href="https://wizart.atlassian.net/wiki/spaces/WDP/pages/2682915267/File+upload+requirements">here</a>. Full upload instructions: <a href="https://wizart.atlassian.net/wiki/spaces/WDP/pages/2682914846/PIM+system">How to upload products into PIM system</a>. <b>This step is very important. </b> Don’t forget to import products, or ask for help in setting up your PIM account here: <a href="mailto:support@wizart.ai">support@wizart.ai</a>.</p>
    <p style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">All parameters are described in the settings, you can control many parameters, or set up the button yourself using CSS code. If you have any questions, contact here: <a href="mailto:support@wizart.ai">support@wizart.ai</a>.</p>

    <div class="wizart-images-wrapper">
        <div class="image-container" onclick="openDetails('details-product-page')">
            <img src="<?php echo plugins_url('assets/integrations/entry_point_button_integration_1.png', __FILE__); ?>"
                 alt="Integration Example">
            <span class="hover-text">A button on the website's product page</span>
        </div>
        <div class="image-container" onclick="openDetails('details-homepage')">
            <img src="<?php echo plugins_url('assets/integrations/main_page_integration_1.gif', __FILE__); ?>"
                 alt="Integration Example">
            <span class="hover-text">A fixed button on the website's homepage</span>
        </div>
        <div class="image-container" onclick="openDetails('details-iframe')">
            <img src="<?php echo plugins_url('assets/integrations/iframe_product_page_integration.png', __FILE__); ?>"
                 alt="Integration Example">
            <span class="hover-text">An iframe integration on the website's product page</span>
        </div>
    </div>

    <form method="POST" action="options.php">
        <?php
        settings_fields('wizart_button_settings_group');
        do_settings_sections('wizart_button_settings_group');
        ?>

        <div class="wizart-forms-wrap">
            <details>
                <summary><h2>General Parameters</h2></summary>
                <div class="form-group">
                    <p class="wizart-notice__message">Go to PIM Admin -> Configuration -> Web and copy API Token</p>
                    <label for="token">Token:<span style="color:red">*</span></label><br>
                    <input type="text" id="token" name="token" value="<?php echo esc_attr(get_option('token')); ?>">
                    <p>
                        Api token - generated and issued by Wizart Administrator.
                    </p>

                    <hr style="margin:10px 0;">

                    <p class="sku-option__message">Enable the use of the product name as SKU on product pages.</p>
                    <div style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">
                        Attention! If this option is enabled, the product name will be used as SKU.
                    </div>
                    <label for="useProductNameAsSku">Use Product Name as SKU:</label><br>
                    <input type="checkbox" id="useProductNameAsSku" name="useProductNameAsSku"
                           value="true" <?php checked(get_option('useProductNameAsSku'), 'true'); ?>>

                    <hr style="margin:10px 0;">

                    <label for="context">Context:</label><br>
                    <input type="text" id="context" name="context" value="<?php echo esc_attr(get_option('context')); ?>">
                    <p>
                        Need to indicate from which part of string in CSV file need to be got. More information you can find <a href="https://wizart.atlassian.net/wiki/spaces/WDP/pages/2682916542/Context+and+Locale">here</a>.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="locale">Locale:</label><br>
                    <input type="text" id="locale" name="locale" value="<?php echo esc_attr(get_option('locale')); ?>">
                    <p>
                        Need to indicate in which language product’s should be displayed. More information you can find <a href="https://wizart.atlassian.net/wiki/spaces/WDP/pages/2682916542/Context+and+Locale">here</a>.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="roomUuid">Room uuid:</label><br>
                    <input type="text" id="roomUuid" name="roomUuid" value="<?php echo esc_attr(get_option('roomUuid')); ?>">
                    <p>
                        The room with the selected uuid will be opened.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="openFirstRoom">Open First Room:</label><br>
                    <input type="hidden" name="openFirstRoom" value="0">
                    <input type="checkbox" id="openFirstRoom" name="openFirstRoom" value="1" <?php checked(get_option('openFirstRoom'), '1'); ?>>
                    <p>
                        Skipping step a room selection and open any first room.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="deactivateCustomPhoto">Deactivate Custom Photo:</label><br>
                    <input type="hidden" name="deactivateCustomPhoto" value="0">
                    <input type="checkbox" id="deactivateCustomPhoto" name="deactivateCustomPhoto" value="1" <?php checked(get_option('deactivateCustomPhoto'), '1'); ?>>
                    <p>
                        For deactivating uploading photo.
                    </p>

                    <!--                <hr style="margin:10px 0;">-->
                    <!---->
                    <!--                <label for="wizartFloatingOnAddShoppigCartItem">On Add Shopping Cart Item:</label><br>-->
                    <!--                <input type="text" id="wizartFloatingOnAddShoppigCartItem"-->
                    <!--                       name="wizartFloatingOnAddShoppigCartItem"-->
                    <!--                       value="--><?php //echo esc_attr(get_option('wizartOnAddShoppigCartItem')); ?><!--">-->
                    <!--                <p style="margin-top:5px;">-->
                    <!--                    The function is called on the event of adding an product to the cart.-->
                    <!--                </p>-->
                    <!---->
                    <!--                <hr style="margin:10px 0;">-->
                    <!---->
                    <!--                <label for="wizartFloatingOnRemoveShoppingCartItem">On Remove Shopping Cart Item:</label><br>-->
                    <!--                <input type="text" id="wizartFloatingOnRemoveShoppingCartItem"-->
                    <!--                       name="wizartFloatingOnRemoveShoppingCartItem"-->
                    <!--                       value="--><?php //echo esc_attr(get_option('wizartOnRemoveShoppingCartItem')); ?><!--">-->
                    <!--                <p style="margin-top:5px;">-->
                    <!--                    The function is called on the event of deleting an product to the cart.-->
                    <!--                </p>-->

                </div>
            </details>

            <details id="details-product-page">
                <summary><h2>A button on the website's product page</h2></summary>
                <div class="form-group">
                    <p class="wizart-notice__message">Activates the wizart visualizer button on product pages.</p>
                    <div style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">
                        Attention! The button only appears for those products that have an SKU and they match the SKU in
                        the PIM admin (<a href="https://pim-admin.wizart.ai/admin">https://pim-admin.wizart.ai/admin</a>).
                    </div>
                    <label for="wizartEntryPointButtonDisplay">Show Button:</label><br>
                    <input type="checkbox" id="wizartEntryPointButtonDisplay" name="wizartEntryPointButtonDisplay"
                           value="false" <?php checked(get_option('wizartEntryPointButtonDisplay'), 'false'); ?>>

                    <hr style="margin:10px 0;">

                    <div style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">
                        To display a button in only one location, use the required first method. If you want your button
                        to appear in multiple places on a single page, use the second method.
                        <p>Attention! If you specify both values, the value specified in the "elements" field will be selected as the primary one.</p>
                    </div>

                    <div style="display: flex; align-items: flex-start; gap: 20px;">
                        <div>
                            <label for="wizartEntryElementSelector">Element to add button:<span
                                        style="color:red">*</span></label><br>
                            <input type="text" id="wizartEntryElementSelector" placeholder=".add-to-cart"
                                   name="wizartEntryElementSelector"
                                   value="<?php echo esc_attr(get_option('wizartEntryElementSelector')); ?>">
                            <p style="margin: 0;">
                                A CSS selector to select an element on the page to insert a button where you want.
                            </p>
                        </div>

                        <div>
                            <label for="wizartEntryElementsSelector">Elements to add buttons:</label><br>
                            <input type="text" id="wizartEntryElementsSelector"
                                   placeholder=".add-to-cart, div, #image-id" name="wizartEntryElementsSelector"
                                   value="<?php echo esc_attr(get_option('wizartEntryElementsSelector')); ?>">
                            <p style="margin: 0;">
                                A CSS selector to select multiple elements on the page to insert buttons where you want.
                            </p>
                        </div>
                    </div>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointInsertElementPosition">Insert Element Position:</label><br>
                    <select id="wizartEntryPointInsertElementPosition" name="wizartEntryPointInsertElementPosition">
                        <option value="append" <?php selected(get_option('wizartEntryPointInsertElementPosition'), 'append'); ?>>
                            Append
                        </option>
                        <option value="before" <?php selected(get_option('wizartEntryPointInsertElementPosition'), 'before'); ?>>
                            Before
                        </option>
                        <option value="after" <?php selected(get_option('wizartEntryPointInsertElementPosition'), 'after'); ?>>
                            After
                        </option>
                    </select>
                    <p>
                        A CSS selector is used to choose an element on the page where you want to insert the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointTitle">Title:</label><br>
                    <input type="text" id="wizartEntryPointTitle" name="wizartEntryPointTitle"
                           value="<?php echo esc_attr(get_option('wizartEntryPointTitle')); ?>">
                    <p style="margin-top:5px;">
                        This represents the text to be displayed on the button. The default value is "Try it in your
                        room in one click!".
                    </p>

                    <hr style="margin:10px 0;">

                    <div class="wizart-sections-wrap">
                        <div>
                            <label for="wizartEntryPointTooltipDisable">Tooltip Enable:</label><br>
                            <input type="hidden" name="wizartEntryPointTooltipDisable" value="true">
                            <input type="checkbox" id="wizartEntryPointTooltipDisable"
                                   name="wizartEntryPointTooltipDisable"
                                   value="false" <?php checked(get_option('wizartEntryPointTooltipDisable'), 'false'); ?>>
                            <p style="margin-top:5px;">
                                Tooltip position towards the button. Available values are top, right, bottom, left (the default value is top).
                            </p>
                        </div>

                        <img src="<?php echo plugins_url('assets/integrations/example_tooltip.png', __FILE__); ?>"
                             alt="Integration Example">
                    </div>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointTooltipTitle">Tooltip Title:</label><br>
                    <input type="text" id="wizartEntryPointTooltipTitle" name="wizartEntryPointTooltipTitle"
                           value="<?php echo esc_attr(get_option('wizartEntryPointTooltipTitle')); ?>">
                    <p style="margin-top:5px;">
                        This represents the text to be displayed on the tooltip. The default value is "See it in your
                        room!".
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointTooltipPosition">Tooltip Position:</label><br>
                    <select id="wizartEntryPointTooltipPosition" name="wizartEntryPointTooltipPosition">
                        <option value="top" <?php selected(get_option('wizartEntryPointTooltipPosition'), 'top'); ?>>
                            Top
                        </option>
                        <option value="right" <?php selected(get_option('wizartEntryPointTooltipPosition'), 'right'); ?>>
                            Right
                        </option>
                        <option value="bottom" <?php selected(get_option('wizartEntryPointTooltipPosition'), 'bottom'); ?>>
                            Bottom
                        </option>
                        <option value="left" <?php selected(get_option('wizartEntryPointTooltipPosition'), 'left'); ?>>
                            Left
                        </option>
                    </select>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointGlitterDisable">Glitter Enable:</label><br>
                    <input type="hidden" name="wizartEntryPointGlitterDisable" value="true">
                    <input type="checkbox" id="wizartEntryPointGlitterDisable" name="wizartEntryPointGlitterDisable"
                           value="false" <?php checked(get_option('wizartEntryPointGlitterDisable'), 'false'); ?>>
                    <p style="margin-top:5px;">
                        Glitter on the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointClassName">Class Name:</label><br>
                    <input type="text" id="wizartEntryPointClassName" name="wizartEntryPointClassName"
                           value="<?php echo esc_attr(get_option('wizartEntryPointClassName', 'wizart-product-page')); ?>">
                    <p style="margin-top:5px;">
                        Class to be set for the button element on the page. Mostly, using to change more style, that our
                        default parameters can’t (e.x. box-shadow).
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointBorderRadius">Border Radius:</label><br>
                    <input type="text" id="wizartEntryPointBorderRadius" name="wizartEntryPointBorderRadius"
                           value="<?php echo esc_attr(get_option('wizartEntryPointBorderRadius')); ?>">
                    <p style="margin-top:5px;">
                        Button border-radius.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointBackground">Background:</label><br>
                    <input type="text" id="wizartEntryPointBackground" name="wizartEntryPointBackground"
                           value="<?php echo esc_attr(get_option('wizartEntryPointBackground')); ?>">
                    <p style="margin-top:5px;">
                        Button background color.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointColor">Color:</label><br>
                    <input type="text" id="wizartEntryPointColor" name="wizartEntryPointColor"
                           value="<?php echo esc_attr(get_option('wizartEntryPointColor')); ?>">
                    <p style="margin-top:5px;">
                        Button text color.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointWidth">Width:</label><br>
                    <input type="text" id="wizartEntryPointWidth" name="wizartEntryPointWidth"
                           value="<?php echo esc_attr(get_option('wizartEntryPointWidth')); ?>">
                    <p style="margin-top:5px;">
                        Max button width.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointHeight">Height:</label><br>
                    <input type="text" id="wizartEntryPointHeight" name="wizartEntryPointHeight"
                           value="<?php echo esc_attr(get_option('wizartEntryPointHeight')); ?>">
                    <p style="margin-top:5px;">
                        Max button height.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointBorder">Border:</label><br>
                    <input type="text" id="wizartEntryPointBorder" name="wizartEntryPointBorder"
                           value="<?php echo esc_attr(get_option('wizartEntryPointBorder')); ?>">
                    <p style="margin-top:5px;">
                        Style of button. For example: <code>2px solid</code>.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointImage">Image:</label><br>
                    <input type="text" id="wizartEntryPointImage" name="wizartEntryPointImage"
                           value="<?php echo esc_attr(get_option('wizartEntryPointImage')); ?>">
                    <p style="margin-top:5px;">
                        Link to the icon that will be displayed on the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointOnloadCallback">Onload Callback:</label><br>
                    <input type="text" id="wizartEntryPointOnloadCallback" name="wizartEntryPointOnloadCallback"
                           value="<?php echo esc_attr(get_option('wizartEntryPointOnloadCallback')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is loaded.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointOnCloseCallback">On Close Callback:</label><br>
                    <input type="text" id="wizartEntryPointOnCloseCallback" name="wizartEntryPointOnCloseCallback"
                           value="<?php echo esc_attr(get_option('wizartEntryPointOnCloseCallback')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is closed.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointOnButtonClick">On Button Click:</label><br>
                    <input type="text" id="wizartEntryPointOnButtonClick" name="wizartEntryPointOnButtonClick"
                           value="<?php echo esc_attr(get_option('wizartEntryPointOnButtonClick')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is opened.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointIframeElementSelector">Iframe Element Selector:</label><br>
                    <input type="text" id="wizartEntryPointIframeElementSelector"
                           name="wizartEntryPointIframeElementSelector"
                           value="<?php echo esc_attr(get_option('wizartEntryPointIframeElementSelector', 'body')); ?>">
                    <p style="margin-top:5px;">
                        A CSS selector to select an element on the page to insert the fitting room where you want. The
                        best way to put iframe is “before body“.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartEntryPointInsertIframeElementPosition">Insert Iframe Element Position:</label><br>
                    <select id="wizartEntryPointInsertIframeElementPosition"
                            name="wizartEntryPointInsertIframeElementPosition">
                        <option value="before" <?php selected(get_option('wizartEntryPointInsertIframeElementPosition', 'before'), 'before'); ?>>
                            Before
                        </option>
                        <option value="append" <?php selected(get_option('wizartEntryPointInsertIframeElementPosition', 'before'), 'append'); ?>>
                            Append
                        </option>
                        <option value="after" <?php selected(get_option('wizartEntryPointInsertIframeElementPosition', 'before'), 'after'); ?>>
                            After
                        </option>
                    </select>
                    <p style="margin-top:5px;">
                        The insertion position of the element. Values: append, before, after. default value: append. The
                        best way to put iframe is “before body“.
                    </p>

                </div>

            </details>
            <details  id="details-homepage">
                <summary><h2>A fixed button on the website's homepage</h2></summary>
                <div class="form-group">
                    <label for="wizartFloatingButtonDisplay">Show Button:</label><br>
                    <input type="checkbox" id="wizartFloatingButtonDisplay" name="wizartFloatingButtonDisplay"
                           value="false" <?php checked(get_option('wizartFloatingButtonDisplay'), 'false'); ?>>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingElementSelector">Element to add button:</label><br>
                    <input type="text" id="wizartFloatingElementSelector" name="wizartFloatingElementSelector"
                           value="<?php echo esc_attr(get_option('wizartFloatingElementSelector', 'body')); ?>">
                    <p>
                        A CSS selector to select an element on the page to insert a button where you want.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingInsertElementPosition">Insert Element Position:</label><br>
                    <select id="wizartFloatingInsertElementPosition" name="wizartFloatingInsertElementPosition">
                        <option value="append" <?php selected(get_option('wizartFloatingInsertElementPosition'), 'before'); ?>>
                            Before
                        </option>
                        <option value="before" <?php selected(get_option('wizartFloatingInsertElementPosition'), 'append'); ?>>
                            Append
                        </option>
                        <option value="after" <?php selected(get_option('wizartFloatingInsertElementPosition'), 'after'); ?>>
                            After
                        </option>
                    </select>
                    <p>
                        A CSS selector is used to choose an element on the page where you want to insert the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingFontSize">Font Size:</label><br>
                    <input type="text" id="wizartFloatingFontSize" name="wizartFloatingFontSize"
                           value="<?php echo esc_attr(get_option('wizartFloatingFontSize')); ?>">
                    <p style="margin-top:5px;">
                        Font size of your button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingTitle">Title:</label><br>
                    <input type="text" id="wizartFloatingTitle" name="wizartFloatingTitle"
                           value="<?php echo esc_attr(get_option('wizartFloatingTitle')); ?>">
                    <p style="margin-top:5px;">
                        This represents the text to be displayed on the button. The default value is "Try it in your
                        room in one click!".
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingTooltipDisable">Tooltip Enable:</label><br>
                    <input type="hidden" name="wizartFloatingTooltipDisable" value="true">
                    <input type="checkbox" id="wizartFloatingTooltipDisable" name="wizartFloatingTooltipDisable"
                           value="false" <?php checked(get_option('wizartFloatingTooltipDisable'), 'false'); ?>>
                    <p style="margin-top:5px;">
                        Tooltip position towards the button. Available values are top, right, bottom, left (the
                        default value is top).
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingTooltipTitle">Tooltip Title:</label><br>
                    <input type="text" id="wizartFloatingTooltipTitle" name="wizartFloatingTooltipTitle"
                           value="<?php echo esc_attr(get_option('wizartFloatingTooltipTitle')); ?>">
                    <p style="margin-top:5px;">
                        This represents the text to be displayed on the tooltip. The default value is "See it in
                        your room!".
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingTooltipPosition">Tooltip Position:</label><br>
                    <select id="wizartFloatingTooltipPosition" name="wizartFloatingTooltipPosition">
                        <option value="top" <?php selected(get_option('wizartFloatingTooltipPosition'), 'top'); ?>>
                            Top
                        </option>
                        <option value="right" <?php selected(get_option('wizartFloatingTooltipPosition'), 'right'); ?>>
                            Right
                        </option>
                        <option value="bottom" <?php selected(get_option('wizartFloatingTooltipPosition'), 'bottom'); ?>>
                            Bottom
                        </option>
                        <option value="left" <?php selected(get_option('wizartFloatingTooltipPosition'), 'left'); ?>>
                            Left
                        </option>
                    </select>
                    <p style="margin-top:5px;">
                        Tooltip position towards the button. Available values are top, right, bottom, left (the
                        default value is top).
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingGlitterDisable">Glitter Enable:</label><br>
                    <input type="hidden" name="wizartFloatingGlitterDisable" value="true">
                    <input type="checkbox" id="wizartFloatingGlitterDisable" name="wizartFloatingGlitterDisable"
                           value="false" <?php checked(get_option('wizartFloatingGlitterDisable'), 'false'); ?>>
                    <p style="margin-top:5px;">
                        Glitter on the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingClassName">Class Name:</label><br>
                    <input type="text" id="wizartFloatingClassName" name="wizartFloatingClassName"
                           value="<?php echo esc_attr(get_option('wizartFloatingClassName', 'wizart-home-page')); ?>">
                    <p style="margin-top:5px;">
                        Class to be set for the button element on the page. Mostly, using to change more style, that
                        our default parameters can’t (e.x. box-shadow).
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingBorderRadius">Border Radius:</label><br>
                    <input type="text" id="wizartFloatingBorderRadius" name="wizartFloatingBorderRadius"
                           value="<?php echo esc_attr(get_option('wizartFloatingBorderRadius')); ?>">
                    <p style="margin-top:5px;">
                        Button border-radius.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingBackground">Background:</label><br>
                    <input type="text" id="wizartFloatingBackground" name="wizartFloatingBackground"
                           value="<?php echo esc_attr(get_option('wizartFloatingBackground')); ?>">
                    <p style="margin-top:5px;">
                        Button background color.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingColor">Color:</label><br>
                    <input type="text" id="wizartFloatingColor" name="wizartFloatingColor"
                           value="<?php echo esc_attr(get_option('wizartFloatingColor')); ?>">
                    <p style="margin-top:5px;">
                        Button text color.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingWidth">Width:</label><br>
                    <input type="text" id="wizartFloatingWidth" name="wizartFloatingWidth"
                           value="<?php echo esc_attr(get_option('wizartFloatingWidth')); ?>">
                    <p style="margin-top:5px;">
                        Max button width.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingHeight">Height:</label><br>
                    <input type="text" id="wizartFloatingHeight" name="wizartFloatingHeight"
                           value="<?php echo esc_attr(get_option('wizartFloatingHeight')); ?>">
                    <p style="margin-top:5px;">
                        Max button height.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingBorder">Border:</label><br>
                    <input type="text" id="wizartFloatingBorder" name="wizartFloatingBorder"
                           value="<?php echo esc_attr(get_option('wizartFloatingBorder')); ?>">
                    <p style="margin-top:5px;">
                        Style of button. For example: <code>2px solid</code>.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingImage">Image:</label><br>
                    <input type="text" id="wizartFloatingImage" name="wizartFloatingImage"
                           value="<?php echo esc_attr(get_option('wizartFloatingImage')); ?>">
                    <p style="margin-top:5px;">
                        Link to the icon that will be displayed on the button.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingOnloadCallback">Onload Callback:</label><br>
                    <input type="text" id="wizartFloatingOnloadCallback" name="wizartFloatingOnloadCallback"
                           value="<?php echo esc_attr(get_option('wizartFloatingOnloadCallback')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is loaded.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingOnCloseCallback">On Close Callback:</label><br>
                    <input type="text" id="wizartFloatingOnCloseCallback" name="wizartFloatingOnCloseCallback"
                           value="<?php echo esc_attr(get_option('wizartFloatingOnCloseCallback')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is closed.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingOnButtonClick">On Button Click:</label><br>
                    <input type="text" id="wizartFloatingOnButtonClick" name="wizartFloatingOnButtonClick"
                           value="<?php echo esc_attr(get_option('wizartFloatingOnButtonClick')); ?>">
                    <p style="margin-top:5px;">
                        The name of the function to be in the global scope. The function will be called when the
                        visualizer is opened.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingIframeElementSelector">Iframe Element Selector:</label><br>
                    <input type="text" id="wizartFloatingIframeElementSelector"
                           name="wizartFloatingIframeElementSelector"
                           value="<?php echo esc_attr(get_option('wizartFloatingIframeElementSelector', 'body')); ?>">
                    <p style="margin-top:5px;">
                        A CSS selector to select an element on the page to insert the fitting room where you want.
                        The best way to put iframe is “before body“.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartFloatingInsertIframeElementPosition">Insert Iframe Element
                        Position:</label><br>
                    <select id="wizartFloatingInsertIframeElementPosition"
                            name="wizartFloatingInsertIframeElementPosition">
                        <option value="before" <?php selected(get_option('wizartFloatingInsertIframeElementPosition', 'before'), 'before'); ?>>
                            Before
                        </option>
                        <option value="append" <?php selected(get_option('wizartFloatingInsertIframeElementPosition', 'before'), 'append'); ?>>
                            Append
                        </option>
                        <option value="after" <?php selected(get_option('wizartFloatingInsertIframeElementPosition', 'before'), 'after'); ?>>
                            After
                        </option>
                    </select>
                    <p style="margin-top:5px;">
                        The insertion position of the element. Values: append, before, after. default value: append.
                        The best way to put iframe is “before body“.
                    </p>
                </div>
            </details>
            <details id="details-iframe">
                <summary><h2>An iframe integration on the website's product page</h2></summary>
                <div class="form-group">
                    <p class="wizart-notice__message">Activates the wizart visualizer iframe on product pages.</p>
                    <div style="border: 1px solid #ffa500; padding: 15px; margin: 10px auto; max-width: 600px; background-color: #fff7e6;">
                        Attention! The button only appears for those products that have an SKU and they match the
                        SKU in the PIM admin (<a href="https://pim-admin.wizart.ai/admin">https://pim-admin.wizart.ai/admin</a>).
                    </div>
                    <label for="wizartIframeIntegrationDisplay">Show Iframe:</label><br>
                    <input type="checkbox" id="wizartIframeIntegrationDisplay" name="wizartIframeIntegrationDisplay"
                           value="false" <?php checked(get_option('wizartIframeIntegrationDisplay'), 'false'); ?>>

                    <hr style="margin:10px 0;">

                    <p class="sku-option__message">Insert location of the iframe on product page.</p>
                    <label for="wizartIframeIntegrationSelector">Element to add iframe:<span
                                style="color:red">*</span></label><br>
                    <input type="text" id="wizartIframeIntegrationSelector" placeholder=".add-to-cart"
                           name="wizartIframeIntegrationSelector"
                           value="<?php echo esc_attr(get_option('wizartIframeIntegrationSelector')); ?>">
                    <p style="margin: 0;">
                        A CSS selector to select an element on the page to insert an iframe where you want.
                    </p>

                    <hr style="margin:10px 0;">

                    <label for="wizartIframeIntegrationInsertElementPosition">Insert Iframe Position:</label><br>
                    <select id="wizartIframeIntegrationInsertElementPosition"
                            name="wizartIframeIntegrationInsertElementPosition">
                        <option value="append" <?php selected(get_option('wizartIframeIntegrationInsertElementPosition'), 'append'); ?>>
                            Append
                        </option>
                        <option value="before" <?php selected(get_option('wizartIframeIntegrationInsertElementPosition'), 'before'); ?>>
                            Before
                        </option>
                        <option value="after" <?php selected(get_option('wizartIframeIntegrationInsertElementPosition'), 'after'); ?>>
                            After
                        </option>
                    </select>
                    <p>
                        A CSS selector is used to choose an element on the page where you want to insert the button.
                    </p>

                    <hr style="margin:10px 0;">

                </div>
            </details>
        </div>

        <script>
            function openDetails(detailsId) {
                document.querySelectorAll('details').forEach(function (details) {
                    details.removeAttribute('open');
                });

                var detailsElement = document.getElementById(detailsId);
                detailsElement.setAttribute('open', 'open');

                detailsElement.scrollIntoView({ behavior: 'smooth' });
            }
        </script>
        <?php submit_button(); ?>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const entryPointCheckbox = document.getElementById('wizartEntryPointButtonDisplay');
        const iframeCheckbox = document.getElementById('wizartIframeIntegrationDisplay');

        if (iframeCheckbox.checked) {
            entryPointCheckbox.disabled = true;
        } else if (entryPointCheckbox.checked) {
            iframeCheckbox.disabled = true;
        }

        entryPointCheckbox.addEventListener('change', function() {
            if (this.checked) {
                iframeCheckbox.disabled = true;
            } else {
                iframeCheckbox.disabled = false;
            }
        });

        iframeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                entryPointCheckbox.disabled = true;
            } else {
                entryPointCheckbox.disabled = false;
            }
        });
    });

</script>