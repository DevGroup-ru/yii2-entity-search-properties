<?php

namespace DevGroup\EntitySearchProperties\searcherBehavior;

use DevGroup\EntitySearch\base\AbstractSearcher;
use DevGroup\EntitySearchProperties\eventHandlers\QueryModifiers\DisablePropertiesAutoFetch;
use DevGroup\EntitySearchProperties\eventHandlers\QueryModifiers\FetchProperties;
use DevGroup\EntitySearchProperties\implementation\db\QueryModifiers\PropertiesModifier;
use yii\base\Behavior;

/**
 * PropertiesBehavior should be binded to AbstractSearcher(for example DbSearcher)
 * It binds to needed events for providing properties searching support.
 *
 * @package DevGroup\EntitySearchProperties\searcherBehavior
 */
class PropertiesBehavior extends Behavior
{
    /**
     * @param AbstractSearcher $owner
     */
    public function attach($owner)
    {
        parent::attach($owner);
        $owner->on(AbstractSearcher::EVENT_BEFORE_PAGINATION, [DisablePropertiesAutoFetch::class, 'modify']);
        $owner->on(AbstractSearcher::EVENT_AFTER_FIND, [FetchProperties::class, 'modify']);
        $owner->on(AbstractSearcher::EVENT_BEFORE_PAGINATION, [PropertiesModifier::class, 'modify']);
    }
}
