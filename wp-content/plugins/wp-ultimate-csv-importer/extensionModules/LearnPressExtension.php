<?php
/**
 * WP Ultimate CSV Importer plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

namespace Smackcoders\FCSV;

if ( ! defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

class LearnPressExtension extends ExtensionHandler{
	private static $instance = null;

    public static function getInstance() {		
        if (LearnPressExtension::$instance == null) {
            LearnPressExtension::$instance = new LearnPressExtension;
        }
        return LearnPressExtension::$instance;
    }


    public function processExtension($data){        
        $import_type = $data;
        $response = [];
        //$import_type = $this->import_type_as($import_type);
        if(is_plugin_active('learnpress/learnpress.php')){   
            if($import_type == 'lp_course'){
                $learn_meta_fields = array(
                            'Duration' => '_lp_duration',
                            'Maximum Students' => '_lp_max_students',
                            'Students Enrolled' => '_lp_students',
                            'Re-Take Course' => '_lp_retake_count',
                            'Featured' => '_lp_featured',
                            'Block Lessons' => '_lp_block_lesson_content',
                            'External Link' => '_lp_external_link_buy_course',
                            'Show Item Links' => '_lp_submission',
                            'Course Result' => '_lp_course_result',
                            'Passing Condition Value' => '_lp_passing_condition',
                            'Price' => '_lp_price',
                            'Sale Price' => '_lp_sale_price',
                            'No Requirement Enroll' => '_lp_required_enroll',
                            'Author' => '_lp_course_author',
                            'Block Expire Duration' => '_lp_block_expire_duration',
                            'Block Finished' => '_lp_block_finished',
                            'Allow Course Repurchase' => '_lp_allow_course_repurchase',
                            'Course Repurchase Option' => '_lp_course_repurchase_option',
                            'Level' => '_lp_level',
                            'Finish Button' => '_lp_has_finish',
                            'Featured Review' => '_lp_featured_review',
                            'No Required Enroll' => '_lp_no_required_enroll',
                            'Requirements' => '_lp_requirements',
                            'Target Audience' => '_lp_target_audiences',
                            'Key Features' => '_lp_key_features',
                            'FAQs' => '_lp_faqs',
                );

                $learn_section_meta_fields = array(
                            'Curriculum Name' => 'curriculum_name',
                            'Curriculum Description' => 'curriculum_description',
                            'Lesson Name' => 'lesson_name',
                            'Lesson Description' => 'lesson_description',
                            'Lesson Duration' => '_lp_lesson_duration',
                            'Preview Lesson' => '_lp_preview',
                            'Quiz Name' => 'quiz_name',
                            'Quiz Description' => 'quiz_description',                                                                                    
                            'Duration' => '_lp_duration',
                            'Minus Points' => '_lp_minus_points',
                            'Minus for Skip' => '_lp_minus_skip_questions',
                            'Passing Grade' => '_lp_passing_grade',
                            'Re-Take' => '_lp_quiz_retake_count',                            
                ); 
            }

            if($import_type == 'lp_lesson'){            
                $learn_meta_fields = array(
                            'Lesson Duration' => '_lp_lesson_duration',
                            'Preview Lesson' => '_lp_preview',
                            'Course Id' => 'course_id',
                            'Curriculum Name' => 'curriculum_name'
                        );
            }

            if($import_type == 'lp_quiz'){            
                $learn_meta_fields = array(
                            'Course Id' => 'course_id',
                            'Curriculum Name' => 'curriculum_name',                                                        
                            'Duration' => '_lp_duration',
                            'Minus Points' => '_lp_minus_points',
                            'Minus for Skip' => '_lp_minus_skip_questions',
                            'Passing Grade' => '_lp_passing_grade',
                            'Re-Take' => '_lp_quiz_retake_count',                            
                            'Question Title' => 'question_title',
                            'Question Description' => 'question_description',
                            'Mark for this Question' => '_lp_mark',
                            'Question explanation' => '_lp_explanation',
                            'Question hint' => '_lp_hint',
                            'Question type' => '_lp_type',
                            'Question Options' => 'question_options',
                            'Instant Check' => '_lp_instant_check',
                            'Nagative Marking' => '_lp_negative_marking',
                            'Pagination' => '_lp_pagination',
                            'Show Correct Review' => '_lp_show_correct_review',
                            'Review' => '_lp_review',
                        );
            }
            if($import_type == 'lp_question'){           
                $learn_meta_fields = array(
                            'Course Id' => 'course_id',
                            'Curriculum Name' => 'curriculum_name',
                            'Mark for this Question' => '_lp_mark',
                            'Question explanation' => '_lp_explanation',
                            'Question hint' => '_lp_hint',
                            'Question type' => '_lp_type',
                            'Question Options' => 'question_options',
                            'Quiz ID' => 'quiz_id'
                        );
            }
            if($import_type == 'lp_order'){
                $learn_meta_fields = array(
                            'Item Id' => 'item_id',
                            'Item Quantity' => 'item_quantity',
                            'Customer' => 'user_id',
                            'Order Total' => '_order_total',
                            'Order Subtotal' => '_order_subtotal',
                            'Item Total' => '_item_total',
                            'Item Subtotal' => '_item_subtotal'
                );
            }
        }

        $learn_meta_fields_line = $this->convert_static_fields_to_array($learn_meta_fields);
        
        if($data == 'lp_course'){
            $learn_section_meta_fields_line = $this->convert_static_fields_to_array($learn_section_meta_fields);

            $response['course_settings_fields'] = $learn_meta_fields_line; 
            $response['curriculum_settings_fields'] = $learn_section_meta_fields_line;  
        }
        if($data == 'lp_lesson'){
            $response['lesson_settings_fields'] = $learn_meta_fields_line; 
        }
        if($data == 'lp_quiz'){
            $response['quiz_settings_fields'] = $learn_meta_fields_line; 
        }  
        if($data == 'lp_question'){
            $response['question_settings_fields'] = $learn_meta_fields_line; 
        }  
        if($data == 'lp_order'){
            $response['order_settings_fields'] = $learn_meta_fields_line; 
        } 
		return $response;
			
    }

    public function extensionSupportedImportType($import_type ){
        if(is_plugin_active('learnpress/learnpress.php')){
            if($import_type == 'nav_menu_item'){
				return false;
			}

           // $import_type = $this->import_name_as($import_type);
            if($import_type == 'lp_course' || $import_type == 'lp_lesson' || $import_type == 'lp_quiz' || $import_type == 'lp_question' || $import_type == 'lp_order') { 
                return true;
            }else{
                return false;
            }
        }
	}
}