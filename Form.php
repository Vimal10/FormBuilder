
<?php
//TODO

/**
 * Form::open()
 * 
 * Form::close()
 * 
 * Form::email()
 * 
 * {{ Form::open(array('url' => 'foo/bar')) }}
  //
  {{ Form::close() }}
 *
 * 
 * echo Form::open(array('url' => 'foo/bar', 'method' => 'put'))
 *  echo Form::token();
 * 
 * echo Form::password('password');
  Generating Other Inputs

  echo Form::email($name, $value = null, $attributes = array());
  echo Form::file($name, $attributes = array());

  Checkboxes and Radio Buttons

  Generating A Checkbox Or Radio Input

  echo Form::checkbox('name', 'value');

  echo Form::radio('name', 'value');
  Generating A Checkbox Or Radio Input That Is Checked

  echo Form::checkbox('name', 'value', true);

  echo Form::radio('name', 'value', true);
  echo Form::number('name', 'value');
  echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));
  Generating A Drop-Down List With Selected Default

  echo Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S');
  Generating A Grouped List

  echo Form::select('animal', array(
  'Cats' => array('leopard' => 'Leopard'),
  'Dogs' => array('spaniel' => 'Spaniel'),
  ));
  Generating A Drop-Down List With A Range

  echo Form::selectRange('number', 10, 20);
  Generating A List With Month Names

  echo Form::selectMonth('month');

  Buttons
 * 
 */
class Form {

//Not Working
    public $type = null; //type of input
    public $class = []; //have multiple class
    public static $elements = []; //for all element //action
    //for form only
    public static $hidden = []; //for open form only :)
    //for checkbox and radiobox
    public static $options = [];
    public static $selected = null;
    //btn
    public static $btnName = null;
    public static $for = null;

    public function __construct()
    {
        
    }

    /**
     * DONE
     * Form::open()
     * Action
     * Method//default post
     * Chartset
     * Extra Attribute
     * ' enctype="multipart/form-data"'
     * hidden fields['name'=>'value']
     * Cstf
     */
    public static function open($action = '', $hiddenFields = [])
    {
        
    }

    /**
     * DONE
     */
    //form elements
    public function multipart()
    {
        //store to element
    }

    /**
     * DONE
     * @return string
     */
    public static function close()
    {
        return "</form>";
    }

    /**
     * Functions
     */

    /**
     * DONE
     * @param type $class
     * @return \Form
     */
    public function addClass($class)
    {
        
    }

    /**
     * DONE
     * @param type $id
     * @return \Form
     */
    public function addId($id)
    {
        
    }

    /**
     * DONE
     * @param type $array
     * @return \Form
     */
    public function addElement($array)
    {
        
    }

    /**
     * DONE
     * @return \Form
     */
    public function method($method)
    {
        
    }

    /*     * *
     * INPUT
     */

    public static function label($name, $for)
    {
        
    }

    public static function help($name = NULL)
    {


        return self::$_instance;
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function text($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function email($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function password($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function number($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function search($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $value
     * @return type
     */
    public static function textarea($name, $value = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $options
     * @param type $selected
     * @return type
     */
    public static function checkbox($name, $options = [], $selected = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $options
     * @param type $selected
     * @return type
     */
    public static function radio($name, $options = [], $selected = null)
    {
        
    }

    /**
     * DONE
     * @return type
     */
    public static function submit($value = 'Submit')
    {
        
    }

    /**
     * DONE
     * @param type $value
     * @return type
     */
    public static function reset($value = 'Reset')
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $options
     * @param type $selected
     * @return type
     */
    public static function select($name, $options = [], $selected = null)
    {
        
    }

    /**
     * DONE
     * @param type $name
     * @param type $options
     * @param type $selected
     * @return type
     */
    public static function selectMultiple($name, $options = [], $selected = [])
    {
        
    }

    public static function selectMonth()
    {
        
    }

    public static function date()
    {
        
    }

    public static function datetime()
    {
        
    }

    public static function time()
    {
        
    }

    //main output class
    public function render()
    {

        switch (self::$type)
        {
            case "form":
//                $this->addClass('form-horizontal');
                return $this->getForForm();
                break;
            case "input":
                $this->addClass('form-control');
                return $this->getForInput();
                break;
            case "textarea":
                $this->addClass('form-control');
                return $this->getForTextarea();
                break;
            case "radio":
                $this->addClass('radio');
                return $this->getForRadio();
                break;
            case "checkbox":
                $this->addClass('checkbox');
                return $this->getForCheckbox();
                break;
            case "select":
                return $this->getForSelect();
                break;

            case "button":
                $this->addClass('btn btn-primary');
                return $this->getForButton();
                break;

            case "label":
                $this->addClass('control-label');
                return $this->getForLabel();
                break;
            case "help":
                $this->addClass('help-block with-errors');
                return $this->getForHelp();
                break;

            default:
                return "Something Wrong";
        }
    }

    private function getForLabel()
    {

        $class = $this->getClass();

        $name = self::$name_id;
        $for = self::$for;
        return '<label for="' . $for . '" ' . $class . '>' . $name . '</label>';
    }

    private function getForHelp()
    {
        $name = self::$name_id;
        //name for ci validation
        $class = $this->getClass();
        return '<span ' . $class . ' ></span>';
    }

    private function getForForm()
    {
        $type = $this->getType();
        $name_id = $this->getName();
        $class = $this->getClass();
        $id = $this->getId();
        $elements = $this->getElements();
        $method = $this->getMethod();
        return '<form role="form" ' . $method . ' ' . $name_id . ' ' . $class . ' ' . $id . ' ' . $elements . '>';
    }

    private function getForInput()
    {
        //id not works here
        $type = $this->getType();
        $name_id = $this->getName();
        $class = $this->getClass();
        $id = $this->getId();
        $elements = $this->getElements();

        $inputType = 'type="' . self::$inputType . '" ';
        return '<input ' . $inputType . ' ' . $name_id . ' ' . $class . ' ' . $elements . '>';
    }

    private function getForTextarea()
    {
        $type = $this->getType();
        $name_id = $this->getName();
        $class = $this->getClass();
        $id = $this->getId();
        $elements = $this->getElements();


        return '<textarea ' . $name_id . ' ' . $class . ' ' . $id . ' ' . $elements . ' ></textarea>';
    }

    private function getForRadio()
    {
        $name = 'name="' . self::$name_id . '" ';
        $options = self::$options;
        $selected = self::$selected;
        $class = $this->getClass();
        $str = '';
        if (!empty($options)):
            foreach ($options as $option => $value):
                $active = '';
                if (!is_null($selected) && ($value == $selected))
                {
                    $active = 'checked="checked" ';
                }

                $str.= '<div ' . $class . '>
                    <label><input type="radio" ' . $name . ' value="' . $value . '" ' . $active . '>' . $option . '</label>
                    </div>';
            endforeach;
        endif;
        return $str;
    }

    private function getForCheckbox()
    {
        $name = 'name = "' . self::$name_id . '" ';
        $class = $this->getClass();
        $id = $this->getId();
        $options = self::$options;
        $selected = self::$selected;
        $str = '';
        if (!empty($options)):
            foreach ($options as $option => $value):

                $active = '';
                if (!is_null($selected) && ($value == $selected))
                {
                    $active = 'checked="checked"';
                }

                $str.= '<div ' . $class . '><label><input type="checkbox" ' . $name . ' value="' . $value . '" ' . $id . ' ' . $active . '>' . $option . '</label></div>';
            endforeach;
        endif;
        return $str;
    }

    private function getForSelect()
    {
        $type = $this->getType();
        $name_id = $this->getName();
        $class = $this->getClass();
//        $id = $this->getId();
        $elements = $this->getElements();
        $inputType = self::$inputType;
        $options = self::$options;
        $selected = self::$selected;
        $str = '<select ' . ' ' . $name_id . $inputType . ' ' . $class . ' ' . $elements . '>';
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
            $str.='<option value="' . $value . '" ' . $active . '>' . $key . '</option>';
        endforeach;
        $str.='</select>';
        return $str;
    }

    private function getForButton()
    {
        $type = self::$inputType;
        $value = self::$btnName;
        $class = $this->getClass();
        return '<button type="' . $type . '" ' . $class . '>' . $value . '</button>';
    }

    private function getType()
    {
        return self::$type;
    }

//form only
    private function getMethod()
    {
        $method = self::$method;
        return 'method = "' . $method . '"';
    }

    private function getClass()
    {
        $class = null;
        $class = $this->class; //self::$class;




        if (empty($class))
        {
            return '';
        }
        $str = '';
        if (is_array($class))
        {
            foreach ($class as $c)
            {
                $str .= ' ' . $c;
            }
        }
        else
        {
            $str = $class;
        }

        return 'class="' . $str . '"';
    }

    private function getId()
    {
        $id = self::$id; //addId only add id not name
        if (empty($id))
        {
            return '';
        }
        return 'id="' . $id . '"';
    }

    private function getName()
    {
        $name_id = self::$name_id;
        if (is_null($name_id))
        {
            return '';
        }
        return 'name="' . $name_id . '" id="' . $name_id . '"';
    }

    private function getElements()
    {
        $elements = self::$elements;
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

    public function test($works)
    {
        echo $works;
        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __destruct()
    {
        echo 'end';
    }

    public function __ssasdestruct()
    {
        self::$type; //type of input
        self::$class = []; //have multiple class
        self::$name_id = null; //should be unique and same
        self::$id = null;
        self::$elements = []; //for extra element //action
        self::$hidden = []; //for open form only :)
        self::$method = 'POST';
        self::$hidden = []; //for open form only :)
        self::$method = 'POST';
        self::$inputType = null; //text,email,number,search
        self::$options = [];
        self::$selected = null;
        self::$btnName = null;

        /**
         * Instance
         */
        self::$_instance = null;
    }

}

//echo Form::open()->method('GET')->addId('form');
//echo Form::text('name')->addClass('input-lg');
//echo Form::textarea('works')->addClass('tinymce');
//echo Form::radio('gender', ['male', 'female','unknown']);
//echo Form::text('hobbie')->addClass('input-lg');
//echo Form::checkbox('works', ['gender' => 1, 'mender' => 2]);
//echo Form::close();
//echo Form::close();
//tested echo Form::close();
//echo Form::checkbox('gender', ['Male' => '1', 'Female' => 2], 2);
//echo Form::selectMultiple('country', ['india' => 5, 'bangladesh' => 6, 'nepal' => 10], [5, 6]);
?>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <?= Form::text('works')->addClass('onother')->addElement(['pattern' => 'email']) ?>

        <?= Form::email('email')->addClass('dsdas') ?>
        <?= Form::close() ?>
    </div>
</div>




<?=
Form::text('test')->test('try to understand')->test('work or not')?>
