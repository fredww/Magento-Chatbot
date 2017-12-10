<?php
/**
 * Werules_Chatbot extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Werules
 * @package        Werules_Chatbot
 * @copyright      Copyright (c) 2017
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * ChatbotAPI admin edit form
 *
 * @category    Werules
 * @package     Werules_Chatbot
 * @author      Ultimate Module Creator
 */
class Werules_Chatbot_Block_Adminhtml_Chatbotapi_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Ultimate Module Creator
     */
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'werules_chatbot';
        $this->_controller = 'adminhtml_chatbotapi';
        $this->_updateButton(
            'save',
            'label',
            Mage::helper('werules_chatbot')->__('Save ChatbotAPI')
        );
        $this->_updateButton(
            'delete',
            'label',
            Mage::helper('werules_chatbot')->__('Delete ChatbotAPI')
        );
        $this->_addButton(
            'saveandcontinue',
            array(
                'label'   => Mage::helper('werules_chatbot')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class'   => 'save',
            ),
            -100
        );
        $this->_formScripts[] = "
            function saveAndContinueEdit() {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * get the edit form header
     *
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getHeaderText()
    {
        if (Mage::registry('current_chatbotapi') && Mage::registry('current_chatbotapi')->getId()) {
            return Mage::helper('werules_chatbot')->__(
                "Edit ChatbotAPI '%s'",
                $this->escapeHtml(Mage::registry('current_chatbotapi')->getChatbotapiId())
            );
        } else {
            return Mage::helper('werules_chatbot')->__('Add ChatbotAPI');
        }
    }
}
