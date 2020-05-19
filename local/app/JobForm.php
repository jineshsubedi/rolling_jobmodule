<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobForm extends Model
{
    protected $table = 'job_form';  

    protected $fillable = array('jobs_id','parent_id', 'f_lable', 'f_type', 'list_menu', 'requ','marks','extra','extra_type','fe_lable');

    public $timestamps = false;

    public function Job()
    {
    	return $this->belongsTo('App\Jobs');
    }

    public static function createForm($id,$title,$type,$list,$rq,$marks,$extra,$extra_type,$fe_lable){
			$intypes= array("text","date","email","url","number","tel");
			$rtypes= array("checkbox","radio");
			if($rq == 1){
				$rq= 'required="required"' ;
			} else {
				$rq='';
			}
			if (in_array($type, $intypes)) {
				
   				$form='<input type="'.$type.'" class="form-control" name="my_datas['.$id.'][fdata]"  '.$rq.' /> <input type="hidden" name="my_datas['.$id.'][marks]" value="'.$marks.'">';
				return $form;
				}
			elseif(in_array($type, $rtypes)) {
				$lm=explode(',',$list);
				$form = '';
				foreach($lm as $key => $l){
   				$form .='<div class="col-md-2"><input type="'.$type.'" name="'.$id.'['.$key.'][fdata]"  value="'.$l.'"  />'.$l.'</div>';
				
				}
				return $form;
				}
			elseif($type =='textarea'){
				$form='<textarea class="form-control" name="my_datas['.$id.'][fdata]"></textarea> <input type="hidden" name="my_datas['.$id.'][marks]" '.$rq.' value="'.$marks.'">';
				return $form;
				}
			elseif($type =='file'){
				$form='<input type="'.$type.'" class="form-control" name="my_files[]"  '.$rq.' /><input type="hidden" name="my_datas['.$id.'][marks]" '.$rq.' value="'.$marks.'">';
				return $form;
				}
			elseif($type =='select'){
				$form = '<select id="hidden_'.$id.'" name="my_datas['.$id.'][marks]" '.$rq.' style="display:none;">';
				$m=explode(',',$marks);
				foreach($m as $key => $l){
   				$form .='<option id="'.$key.'" value="'.$l.'">'.$l.'</option>';
				}
				$form .='</select><select opvl="'.$id.'" name="my_datas['.$id.'][fdata]" '.$rq.' class="form-control select"><option value="">Select Option </option>';
				$lm=explode(',',$list);
				foreach($lm as $k => $ml){
					$m=explode(',',$marks);
				foreach($m as $key => $l){

					if($k == $key){
   				$form .='<option id="'.$l.'" value="'.$ml.'">'.$ml.'</option>';
   			     }
   			     }


				}
				$form .='</select>';
				$form .= '<input type="hidden" id="extra_'.$id.'" value="'.$extra.'"><input type="hidden" id="extra_type'.$id.'" value="'.$extra_type.'"> <input type="hidden" id="fe_lable'.$id.'" value="'.$fe_lable.'">';
				$form .='<div id="aextra_'.$id.'"></div>';
				return $form;
				}
			else {
				return '';
			 }
			
			}
			
	public static function getTitle($id)
    {
      $form = DB::table('job_form')->where('id', $id)->first();
      if (isset($form->f_lable)) {
        $title = $form->f_lable;
      } else {
        $title = 'Root';
      }

      return $title;
    }

    public static function getRequired($id)
    {
    	$jform = DB::table('job_form')->where('id',$id)->first();
    	if (isset($jform->requ)) {
    		if($jform->requ == 1){
				$req= 'required' ;
			} else {
				$req='';
			}
			return $req;
    	} else{
    		return '';
    	}

    }

    public static function createSingleForm($id,$rvalue,$marks)
    {
    	$jform = DB::table('job_form')->where('id',$id)->first();
    	if (isset($jform->id)) {
    		$intypes= array("text","date","email","url","number","tel");
			$rtypes= array("checkbox","radio");
			if($jform->requ == 1){
				$req= 'required="required"' ;
			} else {
				$req='';
			}
			if (in_array($jform->f_type, $intypes)) {
				
   				$form='<input type="'.$jform->f_type.'" class="form-control" name="my_datas['.$jform->id.'][fdata]"  '.$req.' value="'.$rvalue.'" /> <input type="hidden" name="my_datas['.$jform->id.'][marks]" value="'.$jform->marks.'">';
				return $form;
				}
			elseif(in_array($jform->f_type, $rtypes)) {
				$lm=explode(',',$jform->list_menu);
				$form = '';
				foreach($lm as $l){
					if($l == $rvalue){
   				$form +='<input type="'.$jform->f_type.'" checked="checked" class="form-control" name="my_datas['.$jform->id.'][fdata]" id="'.$l.'" value="'.$jform->f_lable.'" '.$req.' />';
   					} else {
   						$form +='<input type="'.$jform->f_type.'" class="form-control" name="my_datas['.$jform->id.'][fdata]" id="'.$l.'" value="'.$jform->f_lable.'" '.$req.' />';
   					}
   				$form += '<input type="hidden" name="my_datas['.$jform->id.'][marks]" value="'.$jform->marks.'">&nbsp &nbsp $nbsp'.$jform->f_lable;
				
				}
				return $form;
				}
			elseif($jform->f_type =='textarea'){
				$form='<textarea class="form-control" name="my_datas['.$jform->id.'][fdata]">'.$rvalue.'</textarea> <input type="hidden" name="my_datas['.$jform->id.'][marks]" '.$req.' value="'.$jform->marks.'">';
				return $form;
				}
			elseif($jform->f_type =='file'){
				$form='<input type="'.$jform->f_type.'" class="form-control" name="my_files[]"  '.$req.' /><input type="hidden" name="my_datas['.$jform->id.'][marks]" '.$req.' value="'.$jform->marks.'">';
				return $form;
				}
			elseif($jform->f_type =='select'){
				$form = '<select id="hidden_'.$jform->id.'" name="my_datas['.$jform->id.'][marks]" '.$req.' style="display:none;">';
				$m=explode(',',$jform->marks);
				foreach($m as $key => $l){
					if($l == $marks){
   						$form .='<option selected="selected" id="'.$key.'" value="'.$l.'">'.$l.'</option>';
   					} else{
   						$form .='<option id="'.$key.'" value="'.$l.'">'.$l.'</option>';
   					}
				}
				$form .='</select><select opvl="'.$jform->id.'" name="my_datas['.$jform->id.'][fdata]" '.$jform->requ.' class="form-control select"><option value="">Select Option </option>';
				$lm=explode(',',$jform->list_menu);
				foreach($lm as $k => $ml){
					$m=explode(',',$jform->marks);
				foreach($m as $key => $l){

					if($k == $key){
						if($ml == $rvalue){
   						$form .='<option selected="selected" id="'.$l.'" value="'.$ml.'">'.$ml.'</option>';
   					} else{
   						$form .='<option id="'.$l.'" value="'.$ml.'">'.$ml.'</option>';
   					}
   			     }
   			     }


				}
				$form .='</select>';
				$form .= '<input type="hidden" id="extra_'.$jform->id.'" value="'.$jform->extra.'"><input type="hidden" id="extra_type'.$jform->id.'" value="'.$jform->extra_type.'"> <input type="hidden" id="fe_lable'.$jform->id.'" value="'.$jform->fe_lable.'">';
				$form .='<div id="aextra_'.$jform->id.'"></div>';
				return $form;
    	} else{
    		return  '';
    	}
    } else{
    	return '';
    }
}

}


