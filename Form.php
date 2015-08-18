
<?php
/**
 * 
 * @package	FormBuilder
 * @author	Vimal Mistry <vimalmistry@gmail.com>
 * @website	http://oceantricks.com
 * @copyright	Copyright (c) 2015
 * @link http://github.com/Vimal10/FormBuilder
 * @Version 1.0.0
 * @filesource
 */

class Form {

    /**
     * Element Type
     * @var string
     */
    public $element_type = null;

    /**
     * Element name=>value in array
     * @var array
     */
    public $elements = [];
    /**
     * Display Name for some case
     * @var string
     */
    public $display_name = null;

    /**
     * Display Value for some case
     * @var string
     */
    public $display_value = null;

    /**
     * For Form Open Only
     * Hidden Field Directly Add to Array
     * @var array
     */
    public $hidden = [];

    /**
     * Options =>radio|checkbox|select
     * @var array
     */
    public $options = [];

    /**
     * Selected Option
     * @var mix 
     */
    public $selected = null;

    public function __construct()
    {
        
    }

    /**
     * 
     * @param  $action
     * @param  $hiddenFields
     * @return \Form
     */
    public static function open($action = null, $hiddenFields = [])
    {
        $form = new Form();
        $form->element_type = 'form';
        if (!is_null($action))
        {
            $form->elements['action'] = $action;
        }
        if (!empty($hiddenFields))
        {
            //do something
            foreach ($hiddenFields as $k => $v)
            {
                $form->hidden[$k] = $v;
            }
        }
        return $form;
    }

    /**
     * 
     * @return \Form
     */
    public function multipart()
    {
        //store to element
        $this->elements['enctype'] = 'multipart/form-data';
        return $this;
    }

    /**
     * 
     * @return string
     */
    public static function close()
    {
        return "</form>" . PHP_EOL;
    }

    /*
     * =================================================
     * FUNCTIONS
     * =================================================
     */

    /**
     * 
     * @param $class
     * @return \Form
     */
    public function addClass($class)
    {
        if (!isset($this->elements['class']))
        {
            $this->elements['class'] = '';
        }
        $this->elements['class'].=" $class";
        return $this;
    }

    /**
     * 
     * @param $id
     * @return \Form
     */
    public function addId($id)
    {
        $this->elements['id'] = $id;
        return $this;
    }

    /**
     * 
     * @param $array
     * @return \Form
     */
    public function addElement($array = [])
    {
        if (is_array($array) && !empty($array))
        {
            foreach ($array as $k => $v)
            {
                $this->elements[$k] = $v;
            }
        }
        return $this;
    }

    /**
     * 
     * @param $method
     * @return \Form
     */
    public function method($method)
    {
        $this->elements['method'] = $method;
        return $this;
    }
    
     /**
     *
     * @return \Form
     */
    public function required()
    {
        $this->elements['required'] = 'required';
        return $this;
    }

    /**
     * =========================================================
     * MAIN FORM ELEMENTS
     * =========================================================
     */

    /**
     * 
     * @param $name
     * @param $for
     * @return \Form
     */
    public static function label($name, $for)
    {
        $form = new Form();
        $form->element_type = 'label';
        $form->display_name = $name;
        $form->elements['for'] = $for;
        return $form;
    }

    /**
     * 
     * @param  $name
     * @return \Form
     */
    public static function help($name = NULL)
    {
        $form = new Form();
        $form->element_type = 'help';
        $form->display_name = $name;
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function text($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'input';
        $form->elements['type'] = 'text';
        $form->elements['name'] = $name;
        $form->elements['id'] = $name;
        if (!is_null($value))
        {
            $form->elements['value'] = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function email($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'input';
        $form->elements['name'] = $name;
        $form->elements['type'] = 'email';
        if (!is_null($value))
        {
            $form->elements['value'] = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function password($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'input';
        $form->elements['name'] = $name;
        $form->elements['type'] = 'password';
        if (!is_null($value))
        {
            $form->elements['value'] = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function number($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'input';
        $form->elements['name'] = $name;
        $form->elements['type'] = 'number';
        if (!is_null($value))
        {
            $form->elements['value'] = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function search($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'input';
        $form->elements['name'] = $name;
        $form->elements['type'] = 'search';
        if (!is_null($value))
        {
            $form->elements['value'] = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $value
     * @return \Form
     */
    public static function textarea($name, $value = null)
    {
        $form = new Form();
        $form->element_type = 'textarea';
        $form->elements['name'] = $name;
        if (!is_null($value))
        {
            $form->display_value = $value;
        }
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $options
     * @param $selected
     * @return \Form
     */
    public static function checkbox($name, $options = [], $selected = null)
    {
        $form = new Form();
        $form->element_type = 'checkbox';
        $form->elements['name'] = $name;
        $form->options = $options;
        $form->selected = $selected;
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $options
     * @param $selected
     * @return \Form
     */
    public static function radio($name, $options = [], $selected = null)
    {
        $form = new Form();
        $form->element_type = 'radio';
        $form->elements['name'] = $name;
        $form->options = $options;
        $form->selected = $selected;
        return $form;
    }

    /**
     * 
     * @param $value
     * @return \Form
     */
    public static function submit($value = 'Submit')
    {
        $form = new Form();
        $form->element_type = 'button';
        $form->elements['type'] = 'submit';
        $form->display_name = $value;
        return $form;
    }

    /**
     * 
     * @param $value
     * @return \Form
     */
    public static function reset($value = 'Reset')
    {
        $form = new Form();
        $form->element_type = 'button';
        $form->elements['type'] = 'reset';
        $form->display_name = $value;
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $options
     * @param $selected
     * @return \Form
     */
    public static function select($name, $options = [], $selected = null)
    {
        $form = new Form();
        $form->element_type = 'select';
        $form->elements['name'] = $name;
        $form->options = $options;
        $form->selected = $selected;
        return $form;
    }

    /**
     * 
     * @param $name
     * @param $options
     * @param $selected
     * @return \Form
     */
    public static function selectMultiple($name, $options = [], $selected = [])
    {
        $form = new Form();
        $form->element_type = 'select';
        $form->elements['name'] = $name;
        $form->elements['multiple'] = NULL;
        $form->options = $options;
        $form->selected = $selected;
        return $form;
    }

    public static function selectMonth()
    {
        //soon
    }

    public static function date()
    {
        //soon
    }

    public static function datetime()
    {
        //soon
    }

    public static function time()
    {
        //soon
    }

    /**
     * 
     * @return string
     */
    public function render()
    {

        switch ($this->element_type)
        {
            case "form":
                $this->addClass('form-horizontal');
                return $this->renderForm();
                break;
            case "input":
                $this->addClass('form-control');
                return $this->renderInput();
                break;
            case "textarea":
                $this->addClass('form-control');
                return $this->renderTextarea();
                break;
            case "radio":
                $this->addClass('radio');
                return $this->renderRadio();
                break;
            case "checkbox":
                $this->addClass('checkbox');
                return $this->renderCheckbox();
                break;
            case "select":
                 $this->addClass('form-control');
                return $this->renderSelect();
                break;

            case "button":
                $this->addClass('btn btn-primary');
                return $this->renderButton();
                break;

            case "label":
                $this->addClass('control-label');
                return $this->renderLabel();
                break;
            case "help":
                $this->addClass('help-block with-errors');
                return $this->renderHelp();
                break;

            default:
                return "Something Wrong";
        }
    }

    /**
     * ===================================================
     * PRIVATE METHODS
     * ===================================================
     */

    /**
     * 
     * @return string
     */
    private function renderLabel()
    {

        $elements = $this->getElements();
        return '<label ' . $elements . '>' . $this->display_name . '</label>' . PHP_EOL;
    }

    /**
     * 
     * @return string
     */
    private function renderHelp()
    {
        $elements = $this->getElements();

        return '<span ' . $elements . ' >' . $this->display_name . '</span>' . PHP_EOL;
    }

    /**
     * 
     * @return string
     */
    private function renderForm()
    {

        $elements = $this->getElements();

        return '<form role="form" ' . $elements . '>' . PHP_EOL;
    }

    /**
     * 
     * @return string
     */
    private function renderInput()
    {

        $elements = $this->getElements();
        return '<input ' . $elements . '>' . PHP_EOL;
    }

    /**
     * 
     * @return string
     */
    private function renderTextarea()
    {

        $elements = $this->getElements();
        return '<textarea ' . $elements . ' >' . $this->display_value . '</textarea>' . PHP_EOL;
    }

    /**
     * 
     * @return string
     */
    private function renderRadio()
    {

        $options = $this->options;
        $selected = $this->selected;

        $elements = $this->getElements();
        $str = '';
        if (!empty($options)):
            foreach ($options as $option => $value):
                $active = '';
                if (!is_null($selected) && ($value == $selected))
                {
                    $active = 'checked="checked" ';
                }

                $str.= '<div class="radio">' . PHP_EOL .
                        '<label>' . PHP_EOL . '<input' . $elements . ' ' . $active . '>' . PHP_EOL . $option . '</label>' . PHP_EOL .
                        '</div>';
            endforeach;
        endif;
        return $str;
    }

    /**
     * 
     * @return string
     */
    private function renderCheckbox()
    {
        $elements = $this->getElements();
        $options = $this->options;
        $selected = $this->selected;
        $str = '';
        if (!empty($options)):
            foreach ($options as $option => $value):

                $active = '';
                if (!is_null($selected) && ($value == $selected))
                {
                    $active = 'checked="checked"';
                }

                $str.= '<div class"checkbox">' . PHP_EOL . '<label><input ' . $elements . ' ' . $active . '>' . $option . '</label>' . PHP_EOL . '</div>';
            endforeach;
        endif;
        return $str;
    }

    /**
     * 
     * @return string
     */
    private function renderSelect()
    {

        $elements = $this->getElements();

        $options = $this->options;
        $selected = $this->selected;
        $t = '';
        if (isset($elements['multiple']))
        {
            $t = 'multiple';
        }
        $str = '<select ' . $t . ' ' . $elements . '>' . PHP_EOL;
        foreach ($options as $key => $value):

            $active = '';
            if (!is_null($selected) or ! empty($selected))
            {
                if (is_array($selected) && in_array($value, $selected))
                {
                    $active = 'selected="selected"';
                }
                elseif ($value == $selected)
                {
                    $active = 'selected="selected"';
                }
            }
            $str.='<option value="' . $value . '" ' . $active . '>' . $key . '</option>' . PHP_EOL;
        endforeach;
        $str.='</select>' . PHP_EOL;
        return $str;
    }

    /**
     * 
     * @return string
     */
    private function renderButton()
    {
        $elements = $this->getElements();
        return '<button ' . $elements . '>' . $this->display_name . '</button>' . PHP_EOL;
    }

    /**
     * 
     * @return boolean
     */
    private function getElementType()
    {
        return $this->element_type;
    }

    /**
     * 
     * @return string
     */
    private function getElements()
    {
        $elements = $this->elements;
        if (empty($elements))
        {
            return '';
        }

        $str = '';
        foreach ($elements as $k => $v)
        {
            $str.=' ' . $k . '="' . $v . '" ';
        }
        return $str;
    }

    /**
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

}
