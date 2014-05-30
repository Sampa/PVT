<?php
class SurveyForm extends CFormModel{
    public $surveyId;
    public $questionId;
    private $_dynamicData=array();
    private $_dynamicFields = array();

    public function addAttribute($label,$attribute){
        $this->_dynamicFields[$label] = $attribute;
    }
    public function rules() {
        return array(
            array('firstname, lastname', 'safe')
        );
    }

    public function attributeNames() {
        return array_merge(
            parent::attributeNames(),
            array_keys($this->_dynamicFields)
        );
    }

    /**
     * Returns the value for a dynamic attribute, if not, falls back to parent
     * method
     *
     * @param type $name
     * @return type
     */
    public function __get($name) {
        if (!empty($this->_dynamicFields[$name])) {
            if (!empty($this->_dynamicData[$name])) {
                return $this->_dynamicData[$name];
            } else {
                return null;
            }

        } else {
            return parent::__get($name);
        }
    }

    /**
     * Overrides the setter to store dynamic data.
     *
     * @param type $name
     * @param type $val
     */
    public function __set($name, $val) {
        if (!empty($this->_dynamicFields[$name])) {
            $this->_dynamicData[$name] = $val;
        } else {
            parent::__set($name, $value);
        }
    }

} 