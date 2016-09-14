<?php

/*
    @Description: common function Model
    @Author: Kaushik Valiya	
    @Input: 
    @Output: 
    @Date: 11-12-15*/

class common_function_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = '';
    }
	
	/*
    @Description: generate string 
    @Author: Kaushik Valiya
    @Input: length of string
    @Output: generate string in uppercase
    @Date: 11-12-15*/

	public function randr($j = 8)
        {
        $string = "";
        for($i=0;$i < $j;$i++)
        {
            srand((double)microtime()*1234567);
            $x = mt_rand(0,2);
            switch($x)
            {
                case 0:$string.= chr(mt_rand(97,122));break;
                case 1:$string.= chr(mt_rand(65,90));break;
                case 2:$string.= chr(mt_rand(48,57));break;
            }
        }
        return strtoupper($string);
    }
	
	/*
    @Description: common function Model for encrypt Script
    @Author: Kaushik Valiya
    @Input: 
    @Output: 
    @Date: 11-12-15*/
	
	function encrypt_script($string)
	{
		$key = $this->config->item('encryption_key');
		
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
		
		return $encrypted;
	}
	
	/*
	@Description: common function Model for decrypt Script
	@Author: Kaushik Valiya
	@Input: 
	@Output: 
	@Date: 11-12-15
	*/
	
	function decrypt_script($string)
	{
		$key = $this->config->item('encryption_key');
		
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		
		return $decrypted;
	}
	
	/*
	@Description: function to send email
	@Author: Kaushik Valiya
	@Input: 
	@Output: 
	@Date: 22-01-2014
	*/
	function send_email($to = '', $subject = '', $message = '', $from = '', $cc = '',$bcc ='',$data='') {
       
        $this->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'support@tops-int.com',
            'smtp_timeout' => '30',
            'smtp_pass' => 'tops12345',
            'mailtype' => 'html',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_priority(1);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->from($from, $this->config->item('sitename'));
        $this->email->to($to);
        $this->email->cc($cc);
        $this->email->bcc($bcc); 
//        if(!empty($data['attachment_email']))
//		{
//			foreach($data['attachment_email'] as $row_attachment)
//                            $this->email->attach("uploads/attachment_file/".$row_attachment['attachment']);
//			//$this->email->attach("uploads/attachment_temp/".$data['attachment']);
//		}
        if(!empty($data['attachment']))
        {
            $this->email->attach($data['file_path'].$data['attachment']);
        } 
        $this->email->send();
        $this->email->clear(TRUE);
    }

	/*
        @Description: Function for get Records Lists Multiple tables
        @Author: Kaushik Valiya
        @Input: Fieldl list(id,name..), match value(id=id,..), condition(and,or),compare type(=,like),count,limit per page, starting row number
        @Output: Records list
        @Date: 11-12-2015
    */
	function getmultiple_tables_records($table='',$fields='',$join_tables='',$join_type='',$match_values = '',$condition ='', $compare_type = '', $num = '',$offset='',$orderby='',$sort='',$group_by='',$wherestring='',$where_in='',$totalrow='',$having='')
        {  
            
		if(!empty($fields))
		{
			foreach($fields as $coll => $value)
			{
				$this->db->select($value,false);
			}
		}
		
		$this->db->from($table);
		
		if(!empty($join_tables))
		{
			foreach($join_tables as $coll => $value)
			{
				//$this->db->join($coll, $value,$join_type);
				$colldata = explode('jointype',$coll);
				$coll = trim($colldata[0]);
				
				if(!empty($colldata[1]))
				{	
					$join_type1 = trim($colldata[1]);
					if($join_type1 == 'direct')
						$join_type1 = '';
				}
				
				if(isset($join_type1))
					$this->db->join($coll, $value,$join_type1);
				else
					$this->db->join($coll, $value,$join_type);
				
				unset($join_type1);
			}
		}
		
		if($condition != null )
		$this->db->where($condition);
		
		if($wherestring != '')
			$this->db->where($wherestring, NULL, FALSE);
		if(!empty($where_in)){
			//$this->db->where_in('bm.id',$where_in['bm.id']);
			//pr($where_in);
			foreach($where_in as $key => $value){
				$this->db->where_in($key,$value);
			}
		}
			
		if($group_by != null)
		$this->db->group_by($group_by);
		if($having != null)
			$this->db->having($having);
		if($orderby != null && $sort != null)
			$this->db->order_by($orderby,$sort);
		elseif($orderby != null )
		{
			if($orderby == 'special_case')
				$this->db->order_by('is_done asc,task_date asc');
			elseif($orderby == 'special_case_task')
				$this->db->order_by('id desc');
			else
				$this->db->order_by($orderby);
		}
		
				
		if($match_values != null &&  $compare_type != null )
		$this->db->or_like($match_values);
		//echo $num."<br>".$offset."<br>";
		if($offset != null && $num != null)
			$this->db->limit($num,$offset);
		elseif($num != null )
			$this->db->limit($num);
		
		$query_FC = $this->db->get();
               //echo $this->db->last_query();exit;
                if(!empty($totalrow))
                    return $query_FC->num_rows();
		else
                    return $query_FC->result_array();
  
	}
        
     	/*
        @Description: Function for Date Formate Changes
        @Author: Kaushik Valiya
        @Input: Date (E.g MM/DD/YYYY)
        @Output: Date  (E.g YYYY/MM/DD)
        @Date: 11-12-2015
    */   
    function date_formate($date_con)
    {
        //return date('Y-m-d', strtotime(str_replace('-', '/', $date_con)));
        return date('Y-m-d', strtotime(str_replace('/', '-', $date_con)));
    }
     function datetime_formate($date_con)
    {
        //return date('Y-m-d', strtotime(str_replace('-', '/', $date_con)));
        return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date_con)));
    }
     function time_formate($time_con)
    {
        //return date('Y-m-d', strtotime(str_replace('-', '/', $date_con)));
        //return date('H:i:s', strtotime($time_con));
        return date("H:i", strtotime($time_con));
    }
    /*
        @Description: Function for Insert Data
        @Author     : Kaushik Valiya
        @Input      : Insert data
        @Output     : 
        @Date       : 11-12-2015
    */   
     public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /*
        @Description: Function for Update Data
        @Author     : Kaushik Valiya
        @Input      : Update id
        @Output     : 
        @Date       : 11-12-2015
    */   
    public function update($table, $data, $where='', $wherestring='')
    {
        if(!empty($where))
            $this->db->where($where);
        if(!empty($wherestring))
            $this->db->where($wherestring, NULL, FALSE);
        $this->db->update($table, $data);
    }
     /*
        @Description: Function for Delete Data
        @Author     : Kaushik Valiya
        @Input      : Delete id
        @Output     : 
        @Date       : 11-12-2015
    */   
    public function delete($table, $where)
    {
        
        $this->db->where($where);
        $this->db->delete($table);
    }
    
     /*
        @Description: Function for Get Records Lists tables
        @Author     : Kaushik Valiya
        @Input      : 
        @Output     : 
        @Date       : 11-12-2015
    */   
      public function select($table_name, $getfields = '', $match_values = '', $condition = '', $compare_type = '', $count = '', $num = '', $offset = '', $orderby = '', $sort = '',$where_clause='',$totalrows='',$group_by='',$where_str='')
    {
       
        $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$table_name;
        $where='';
        
        if($match_values)
        {
            $keys = array_keys($match_values);
            $compare_type = $compare_type ? $compare_type : 'like';
            if($condition!='')
                $and_or=$condition;
            else 
                $and_or = ($compare_type == 'like') ? ' OR ' : ' AND '; 
          
            $where = 'WHERE ';
            switch ($compare_type)
            {
                case 'like':
                    $where .= $keys[0].' '.$compare_type .'"%'.$match_values[$keys[0]].'%" ';
                    break;

                case '=':
                default:
                    $where .= $keys[0].' '.$compare_type .'"'.$match_values[$keys[0]].'" ';
                    break;
            }
            $match_values = array_slice($match_values, 1);
            
            foreach($match_values as $key=>$value)
            {                
                $where .= $and_or.' '.$key.' ';
                switch ($compare_type)
                {
                    case 'like':
                        $where .= $compare_type .'"%'.$value.'%"';
                        break;
                    
                    case '=':
                    default:
                        $where .= $compare_type .'"'.$value.'"';
                        break;
                }
            }
        }
        if(!empty($where_clause))
        {
            $where .= ' AND (';
            
            foreach($where_clause as $key=>$val)
            {
                $where .= $key." LIKE '%".$val."%' OR ";
            }
            $where = rtrim($where,'OR ');
            $where .= ')';
        }
        if(!empty($where_str))
            $where .= $where_str;
            
        if(!empty($group_by))
        {
            $sql .=' group by '.$group_by;    
        }
        $orderby = ($orderby !='')?' order by '.$orderby.' '.$sort.' ':'';
        if($offset == "0"){$offset = "";}
        if($num == "0"){$num = "";}
        // echo 'o'.$offset;
        if($offset =="" && $num=="")
            $sql .= ' '.$where.$orderby;
        elseif($offset=="" && $offset== 0)
            $sql .= ' '.$where.$orderby.' '.'limit '.$num;
        else
             $sql .= ' '.$where.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM '.$table_name.' '.$where.$orderby : $sql;
        $query = $this->db->query($query);
        //echo $this->db->last_query();
        if(!empty($totalrows))
            return $query->num_rows();
        else
            return $query->result_array();
    }
}