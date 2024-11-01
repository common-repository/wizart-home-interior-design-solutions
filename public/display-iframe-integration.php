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

        let className = "w-iframe__dep-kit";

        const server_address = 'https://pim-client.wizart.ai';
        const api_token = "<?php echo get_option('token'); ?>";
        const availableVendorCodes = server_address + '/api/articles/available-vendor-codes';

        <?php
        $parameters = array(
            'context' => get_option('context'),
            'locale' => get_option('locale'),
            'room_uuid' => get_option('roomUuid'),
            'open_first_room' => get_option('openFirstRoom'),
            'deactivate_custom_photo' => (int) get_option('deactivateCustomPhoto'),
            'bba' => 'false',
            'is_hide_catalog' => 1
        );
        $parameters = array_filter($parameters, function($value) {
            return !empty($value);
        });
        ?>

        const parameters = <?php echo json_encode($parameters); ?>;

        const entryPoint = new window.WEntryPoint({
            token: api_token,
            vendorCode: vendorCode,
        });

        entryPoint.open({
            parameters: parameters,
            iframeElementSelector: "<?php echo esc_attr(get_option('wizartIframeIntegrationSelector')); ?>",
            insertIframeElementPosition: "<?php echo esc_attr(get_option('wizartIframeIntegrationInsertElementPosition')); ?>"
        });

        checkVendorCodes(availableVendorCodes, vendorCode, api_token, className)
            .then(result => {
                if (result === true) {
                    const elements = document.querySelectorAll(`.${className}`);
                    elements.forEach(element => {
                        element.style.display = "block";
                    });
                }
            });
    });
</script>

<style>
    .w-iframe__dep-kit {
        display: none;
    }
</style>