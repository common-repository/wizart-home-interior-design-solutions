<script type="application/javascript" src="https://d35so7k19vd0fx.cloudfront.net/production/integration/v1.1/floating-button.min.js"></script>

<script>
    const floatingButton = new window.WFloatingButton({
        token: "<?php echo get_option('token'); ?>",
        element: document.querySelectorAll("<?php echo get_option('wizartFloatingElementSelector'); ?>")[0],
    });

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

    floatingButton.render({
        fontSize: "<?php echo esc_attr(get_option('wizartFloatingFontSize')); ?>",
        title: "<?php echo esc_attr(get_option('wizartFloatingTitle')); ?>",
        tooltipTitle: "<?php echo esc_attr(get_option('wizartFloatingTooltipTitle')); ?>",
        tooltipPosition: "<?php echo esc_attr(get_option('wizartFloatingTooltipPosition')); ?>",
        tooltipDisable: "<?php echo esc_attr(get_option('wizartFloatingTooltipDisable')); ?>",
        glitterDisable: "<?php echo esc_attr(get_option('wizartFloatingGlitterDisable')); ?>",
        className: "<?php echo esc_attr(get_option('wizartFloatingClassName')); ?>",
        borderRadius: "<?php echo esc_attr(get_option('wizartFloatingBorderRadius')); ?>",
        parameters: parameters,
        background: "<?php echo esc_attr(get_option('wizartFloatingBackground')); ?>",
        color: "<?php echo esc_attr(get_option('wizartFloatingColor')); ?>",
        width: "<?php echo esc_attr(get_option('wizartFloatingWidth')); ?>",
        height: "<?php echo esc_attr(get_option('wizartFloatingHeight')); ?>",
        border: "<?php echo esc_attr(get_option('wizartFloatingBorder')); ?>",
        image: "<?php echo esc_attr(get_option('wizartFloatingImage')); ?>",
        onloadCallback: "<?php echo esc_attr(get_option('wizartFloatingOnloadCallback')); ?>",
        onCloseCallback: "<?php echo esc_attr(get_option('wizartFloatingOnCloseCallback')); ?>",
        onButtonClick: "<?php echo esc_attr(get_option('wizartFloatingOnButtonClick')); ?>",
        iframeElementSelector: "<?php echo esc_attr(get_option('wizartFloatingIframeElementSelector')); ?>",
        insertIframeElementPosition: "<?php echo esc_attr(get_option('wizartFloatingInsertIframeElementPosition')); ?>",
        onAddShoppigCartItem: "<?php echo esc_attr(get_option('wizartFloatingOnAddShoppigCartItem')); ?>",
        onRemoveShoppingCartItem: "<?php echo esc_attr(get_option('wizartFloatingOnRemoveShoppingCartItem')); ?>"
    });
</script>
