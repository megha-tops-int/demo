<?php

	/*
    @Description: Hidden Link Model
    @Author: Parth Khatri
    @Input: 
    @Output: 
    @Date: 07-05-2015
	*/

class hidden_link_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = 'hidden_link_master';
    }

    /*
    @Description: Function to select records
    @Author: Parth Khatri
    @Input: Fields to be selected along with optional conditions
    @Output: Result of the Query
    @Date: 07-05-2015
    */
   
	public function select_records($getfields='', $match_values = '', $condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$sort='',$where_cond='',$where_or='')
    {
		$fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->table_name;
        $where='';
        
        if($match_values)
        {
            $keys = array_keys($match_values);
            $compare_type = $compare_type ? $compare_type : 'like';
            if($condition!='')
            {
                $and_or=$condition;
            }
            else 
            {
                $and_or = ($compare_type == 'like') ? ' OR ' : ' AND '; 
            }
          
            $where = 'WHERE (';
            
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
			
			$where .= ')';
			
			if($where_cond)
        	{
				foreach($where_cond as $key=>$value)
				{   
					$where .= ' AND ('.$key.' ';
					$where .= ' = "'.$value.'")';
				}
			}
			
        }
		
		if(empty($match_values))
		{
			$where1='';
			if(!empty($where_or))
			{
				$where1 .='where ';
				foreach($where_or as $key=>$value)
				{  
					$where1 .= ' '.$key.' ';
					$where1 .= ' = "'.$value.'" OR';
				}
				$where .= rtrim($where1,' OR');
			}
		}
		
        $orderby = ($orderby !='')?' order by '.$orderby.' '.$sort.' ':'order by `link_name` ASC';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.$orderby;
        elseif($offset=="")
            $sql .= ' '.$where.$orderby.' '.'limit '.$num;
        else
             $sql .= ' '.$where.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM '.$this->table_name.' '.$where.$orderby : $sql;
        $query = $this->db->query($query);
        return $query->result_array();
    }


    /*
        @Description: Function for get User List (Customer)
        @Author     : Parth Khatri
        @Input      : Table(main table for connetct with another tables  ),Fieldl list(id,name..),join table(another tables want to fetch records) match value(id=id,..), condition(and,or),compare type(=,like),count,limit per page, starting row number
        @Output     : User details
        @Date       : 17-07-2014
    */
      function getmultiple_tables_records($table='',$fields='',$join_tables='',$join_type='',$match_values = '',$condition ='', $compare_type = '', $num = '',$offset='',$orderby='',$sort='',$group_by='',$wherestring='',$where='',$totalrows='')
    {  
        foreach($fields as $coll => $value)
        {
            $this->db->select($value);
        }
        
            $this->db->from($table);
        if(!empty($join_tables))
        {
            foreach($join_tables as $coll => $value)
            {
                $this->db->join($coll, $value,$join_type);
            }
        }
        
        if($condition != null )
        $this->db->where($condition);
        
        if($group_by != null)
        $this->db->group_by($group_by);
        
        if($orderby != null && $sort != null)
        $this->db->order_by($orderby,$sort);
        
        elseif($orderby != null )
        $this->db->order_by($orderby);
        
    
        if(!empty($where) && $match_values != null &&  $compare_type != null)
        {
            $wherestr = '';
            
            foreach($where as $key=>$val)
            {
                $wherestr .= $key." = '".$val."' AND ";
            }
            
            $wherestr .= '(';
            
            foreach($match_values as $key=>$val)
            {
                $wherestr .= $key." ".$compare_type." '%".$val."%' OR ";
            }
            
            $wherestr = rtrim($wherestr,'OR ');
            
            $wherestr .= ')';
        
            $this->db->where($wherestr); 
            
        }
        else
        {
            if(!empty($where))
                $this->db->where($where); 
            
            if($match_values != null &&  $compare_type != null )
                $this->db->or_like($match_values, $compare_type);
        }
         if($wherestring != '')
            $this->db->where($wherestring, NULL, FALSE);

        
            
        if($num != null )
        $this->db->limit($num);
        
        if($offset != null && $num != null)
        $this->db->limit($num,$offset);
        
        $query_FC = $this->db->get();
        // echo $this->db->last_query();
        //exit;
        if(!empty($totalrows))
            return $query_FC->num_rows();
        else
            return $query_FC->result_array();
        
        
    }
    


    /*
    @Description: Function to insert new record
    @Author: Parth Khatri
    @Input: Details to be Inserted
    @Output: - ID of the Inserted Record
    @Date: 07-05-2015
    */
	
    function insert_record($data)
    {
        $result =  $this->db->insert($this->table_name,$data);	
		$lastId = mysql_insert_id();
		return $lastId;
    }
	
    /*
    @Description: Function to update record
    @Author: Parth Khatri
    @Input: Details to be Updated
    @Output: - Updates the Record in the DB
    @Date: 07-05-2015
    */
    public function update_record($data)
    {
        $this->db->where('id',$data['id']);
        $query = $this->db->update($this->table_name,$data); 
    }

    /*
    @Description: Function to delete Record
    @Author: Parth Khatri
    @Input: - ID of the record to be Deleted
    @Output: - Deleted the Record from the DB
    @Date: 07-05-2015
    */
    public function delete_record($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table_name);
		$msg = $this->lang->line('common_delete_success_msg');
       	$newdata = array('msg'  => $msg);
       	$this->session->set_userdata('message_session', $newdata);	
    }
	
	/*
    @Description: Function for Pagination
    @Author     : Parth Khatri
    @Input      : 
    @Output     : Unique DB Name
    @Date       : 07-05-2015
    */

	public function getuserpagingid($user_id='')
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->order_by('id','desc');
		$result = $this->db->get()->result_array();
		$op = 0;
		if(count($result) > 0)
		{
			foreach($result as $key=>$row)
			{
				if($row['id'] == $user_id)
				{
					$op = $key;
					$op1 = strlen($op);
					$op = substr($op,0,$op1-1)*10;
				}
			}
		}
		return $op;
	}

}