<?php declare(strict_types=1);

namespace App\Services\Grid;

use Illuminate\Support\Facades\Blade;

/**
 * Grid action class for link. This class generate HTML anchor link
 */
class Action
{
    /**
     * Action href callback. Expected result is URL string
     *
     * @var null|callable
     */
    private $href = null;

    /**
     * Action display condition callback. Expected result is boolean.
     * When return true then action link is generated otherwise not
     *
     * @var null|callable
     */
    private $displayCondition = null;

    public function __construct(private readonly string $idName, private readonly string $label, private readonly array $attributes = [])
    {
    }

    /**
     * Set href callback
     *
     * @param callable|null $href
     * @return Action
     */
    public function setHref(?callable $href): Action
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Set href condition
     *
     * @param callable|null $displayCondition
     * @return Action
     */
    public function setDisplayCondition(?callable $displayCondition): Action
    {
        $this->displayCondition = $displayCondition;
        return $this;
    }

    /**
     * Get name of id column
     */
    public function getIdName(): string
    {
        return $this->idName;
    }

    /**
     * Get action Html
     */
    public function getActionHtml(int $id)
    {
        $html = "";

        if (!is_callable($this->displayCondition) || (is_callable($this->displayCondition) && call_user_func($this->displayCondition, $id))) { # display condition callback is set
            $attributes = "";
            foreach ($this->attributes as $attribute => $value) {
                $attributes .= " {$attribute}=\"$value\"";
            }

            $href = '#';
            if (is_callable($this->href)) { # href call is set
                $href = call_user_func($this->href, $id);
            }

            $html = Blade::render("<a $attributes href=\"$href\">$this->label</a>");
        }

        return $html;
    }
}
