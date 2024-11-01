<script defer
        type="application/javascript"
        src="https://d35so7k19vd0fx.cloudfront.net/production/integration/v1.1/entry-point.min.js"
></script>
<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        const useProductNameAsSku = "<?php echo get_option('useProductNameAsSku'); ?>";

        const vendorCode = useProductNameAsSku === 'true'
            ? "<?php global $product; echo $product->get_name(); ?>"
            : "<?php global $product; echo $product->get_sku(); ?>";

        let className = "<?php echo get_option('wizartEntryPointClassName'); ?>";

        const server_address = 'https://pim-client.wizart.ai';
        const api_token = "<?php echo get_option('token'); ?>";
        const availableVendorCodes = server_address + '/api/articles/available-vendor-codes';

        <?php
        $parameters = array(
            'context' => get_option('context'),
            'locale' => get_option('locale'),
            'room_uuid' => get_option('roomUuid'),
            'open_first_room' => get_option('openFirstRoom'),
            'deactivate_custom_photo' => get_option('deactivateCustomPhoto'),
        );
        $parameters = array_filter($parameters, function($value) {
            return !empty($value);
        });
        ?>
        const parameters = JSON.stringify(<?php echo json_encode($parameters); ?>);

        const elementSelector = "<?php echo esc_attr(get_option('wizartEntryElementSelector')); ?>";
        const elementsSelector = "<?php echo esc_attr(get_option('wizartEntryElementsSelector')); ?>";

        const element = elementSelector ? document.querySelector(elementSelector) : null;
        let elements;

        if (elementsSelector.includes(',')) {
            elements = elementsSelector.split(',').map(selector => {
                return [...document.querySelectorAll(selector.trim())];
            }).flat();
        } else if (elementsSelector) {
            elements = document.querySelectorAll(elementsSelector);
        }

        const entryPoint = new window.WEntryPoint({
            token: api_token,
            vendorCode: vendorCode,
            ...(element && elements
                    ? { element: element, elements: [...elements] } //if both existing
                    : element
                        ? { element: element } //if only element
                        : elements.length > 0
                            ? { elements: [...elements] } //if only elements
                            : {}
            ),
        });

        entryPoint.render({
            title: "<?php echo esc_attr(get_option('wizartEntryPointTitle')); ?>",
            parameters: parameters,
            tooltipTitle: "<?php echo esc_attr(get_option('wizartEntryPointTooltipTitle')); ?>",
            tooltipPosition: "<?php echo esc_attr(get_option('wizartEntryPointTooltipPosition')); ?>",
            tooltipDisable: "<?php echo esc_attr(get_option('wizartEntryPointTooltipDisable')); ?>",
            glitterDisable: "<?php echo esc_attr(get_option('wizartEntryPointGlitterDisable')); ?>",
            className: className,
            borderRadius: "<?php echo esc_attr(get_option('wizartEntryPointBorderRadius')); ?>",
            background: "<?php echo esc_attr(get_option('wizartEntryPointBackground')); ?>",
            color: "<?php echo esc_attr(get_option('wizartEntryPointColor')); ?>",
            width: "<?php echo esc_attr(get_option('wizartEntryPointWidth')); ?>",
            height: "<?php echo esc_attr(get_option('wizartEntryPointHeight')); ?>",
            border: "<?php echo esc_attr(get_option('wizartEntryPointBorder')); ?>",
            image: "<?php echo esc_attr(get_option('wizartEntryPointImage')); ?>",
            onloadCallback: "<?php echo esc_attr(get_option('wizartEntryPointOnloadCallback')); ?>",
            onCloseCallback: "<?php echo esc_attr(get_option('wizartEntryPointOnCloseCallback')); ?>",
            onButtonClick: "<?php echo esc_attr(get_option('wizartEntryPointOnButtonClick')); ?>",
            insertElementPosition: "<?php echo esc_attr(get_option('wizartEntryPointInsertElementPosition')); ?>",
            iframeElementSelector: "<?php echo esc_attr(get_option('wizartEntryPointIframeElementSelector')); ?>",
            insertIframeElementPosition: "<?php echo esc_attr(get_option('wizartEntryPointInsertIframeElementPosition')); ?>",
        });

        checkVendorCodes(availableVendorCodes, vendorCode, api_token, className)
            .then(result => {
                if (result === true) {
                    const elements = document.querySelectorAll(`.${className}`);
                    elements.forEach(element => {
                        element.style.display = "inline-flex";
                    });
                }
            });
    });
</script>

<style>
    .<?php echo esc_attr(get_option('wizartEntryPointClassName')); ?> {
        display: none;
    }
</style>