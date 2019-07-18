<?php

namespace luckywp\tableOfContents\admin\widgets\customizeModal;

use luckywp\tableOfContents\admin\forms\CustomizeForm;
use luckywp\tableOfContents\core\base\Widget;
use WP_Post;

class CustomizeModal extends Widget
{

    /**
     * @var WP_Post|null
     */
    public $post;

    /**
     * @var string|null
     */
    public $widgetId;

    /**
     * @var string
     */
    public $action;

    /**
     * @var CustomizeForm
     */
    public $model;

    /**
     * @var bool
     */
    public $onlyBody;

    public function run()
    {
        return $this->render('modal', [
            'post' => $this->post,
            'widgetId' => $this->widgetId,
            'action' => $this->action,
            'model' => $this->model,
            'onlyBody' => $this->onlyBody,
        ]);
    }
}
