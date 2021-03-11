<?php
$html = '';
if (isset($categories)) {
	if (!empty($categories)) {
		foreach ($categories as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->nrc_categorie_id  . '" class="change-p-status text-danger" data-status="1" data-table="nrc_categories"" data-key-id="nrc_categorie_id" data-id="' . $value->nrc_categorie_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->nrc_categorie_id  . '" class="change-p-status text-success" data-status="0" data-table="nrc_categories"" data-key-id="nrc_categorie_id" data-id="' . $value->nrc_categorie_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
                    	<td><h5>' . $value->name . '</h5></td>
                    	<td><span class="text-muted">' . $value->title . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->nrc_categorie_id.'" data-name="'.$value->name.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="nrc_categories"" data-key-id="nrc_categorie_id" data-id="' . $value->nrc_categorie_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end materials

if (isset($nrc_news)) {
	if (!empty($nrc_news)) {
		foreach ($nrc_news as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->nrc_news_id . '" class="change-p-status text-danger" data-status="1" data-table="nrc_news" data-key-id="nrc_news_id" data-id="' . $value->nrc_news_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->nrc_news_id . '" class="change-p-status text-success" data-status="0" data-table="nrc_news" data-key-id="nrc_news_id" data-id="' . $value->nrc_news_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Product img"></td>
                    	<td><h5>' . $value->cat_name . '</h5></td>
                    	<td><span class="text-muted">' . $value->news_title . '</span></td>
                    	<td><span class="col-green">' . $value->state_name . '</span></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="'.base_url("admin/nrc/edit-news/".$value->nrc_news_id).'" class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="nrc_news"" data-key-id="nrc_news_id" data-id="' . $value->nrc_news_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end nrc_news

// legal start 
if (isset($legal_news)) {
	if (!empty($legal_news)) {
		foreach ($legal_news as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->legal_news_id . '" class="change-p-status text-danger" data-status="1" data-table="legal_news" data-key-id="legal_news_id" data-id="' . $value->legal_news_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->legal_news_id . '" class="change-p-status text-success" data-status="0" data-table="legal_news" data-key-id="legal_news_id" data-id="' . $value->legal_news_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Product img"></td>
                    	<td><h5>' . $value->cat_name . '</h5></td>
                    	<td><span class="text-muted">' . $value->news_title . '</span></td>
                    	<td><span class="col-green">' . $value->state_name . '</span></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="'.base_url("admin/legal/edit-news/".$value->legal_news_id).'" class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="legal_news"" data-key-id="legal_news_id" data-id="' . $value->legal_news_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Attribute size

//legal end 

//hate start 
if (isset($legal_categories)) {
	if (!empty($legal_categories)) {
		foreach ($legal_categories as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->legal_categorie_id  . '" class="change-p-status text-danger" data-status="1" data-table="legal_categories"" data-key-id="legal_categorie_id" data-id="' . $value->legal_categorie_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->legal_categorie_id  . '" class="change-p-status text-success" data-status="0" data-table="legal_categories"" data-key-id="legal_categorie_id" data-id="' . $value->legal_categorie_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
                    	<td><h5>' . $value->name . '</h5></td>
                    	<td><span class="text-muted">' . $value->title . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->legal_categorie_id.'" data-name="'.$value->name.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="legal_categories"" data-key-id="legal_categorie_id" data-id="' . $value->legal_categorie_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end hate_categorie

if (isset($hate_categories)) {
	if (!empty($hate_categories)) {
		foreach ($hate_categories as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->hate_categorie_id  . '" class="change-p-status text-danger" data-status="1" data-table="hate_categories"" data-key-id="hate_categorie_id" data-id="' . $value->hate_categorie_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->hate_categorie_id  . '" class="change-p-status text-success" data-status="0" data-table="hate_categories"" data-key-id="hate_categorie_id" data-id="' . $value->hate_categorie_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
                    	<td><h5>' . $value->name . '</h5></td>
                    	<td><span class="text-muted">' . $value->title . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->hate_categorie_id.'" data-name="'.$value->name.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="hate_categories"" data-key-id="hate_categorie_id" data-id="' . $value->hate_categorie_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end hate_categories
// hate news  start 
if (isset($hate_news)) {
	if (!empty($hate_news)) {
		foreach ($hate_news as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->hate_news_id . '" class="change-p-status text-danger" data-status="1" data-table="hate_news" data-key-id="hate_news_id" data-id="' . $value->hate_news_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->hate_news_id . '" class="change-p-status text-success" data-status="0" data-table="hate_news" data-key-id="hate_news_id" data-id="' . $value->hate_news_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Product img"></td>
                    	<td><h5>' . $value->cat_name . '</h5></td>
                    	<td><span class="text-muted">' . $value->news_title . '</span></td>
                    	<td><span class="col-green">' . $value->state_name . '</span></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="'.base_url("admin/hate/edit-news/".$value->hate_news_id).'" class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                 <a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="hate_news"" data-key-id="hate_news_id" data-id="' . $value->hate_news_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Attribute size
//hate end 

if (isset($timelines)) {
	if (!empty($timelines)) {
		foreach ($timelines as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->timeline_id . '" class="change-p-status text-danger" data-status="1" data-table="timelines" data-key-id="timeline_id" data-id="' . $value->timeline_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->timeline_id . '" class="change-p-status text-success" data-status="0" data-table="timelines" data-key-id="timeline_id" data-id="' . $value->timeline_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
						<td>' . $value->timeline_year . '</td>
                    	<td><span>' . $value->timeline_title . '</span></td>
                    	<td><span>' . $value->timeline_sub_title . '</span></td>
                    	<td><span>' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td><span>' . substr(strip_tags($value->timeline_description), 0, 50) . '..</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->timeline_id.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="legal_categories"" data-key-id="timeline_id" data-id="' . $value->timeline_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="8" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Timelines

if (isset($articles)) {
	if (!empty($articles)) {
		foreach ($articles as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->article_id . '" class="change-p-status text-danger" data-status="1" data-table="articles" data-key-id="article_id" data-id="' . $value->article_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->article_id . '" class="change-p-status text-success" data-status="0" data-table="articles" data-key-id="article_id" data-id="' . $value->article_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
						<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Article img"></td>
                    	<td><span>' . $value->title . '</span></td>
                    	<td><span>' . substr(strip_tags($value->description), 0, 50) . '..</span></td>
                    	<td><span>' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->article_id.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="articles"" data-key-id="article_id" data-id="' . $value->article_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end articles

if (isset($videos)) {
	if (!empty($videos)) {
		foreach ($videos as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->video_id . '" class="change-p-status text-danger" data-status="1" data-table="videos" data-key-id="video_id" data-id="' . $value->video_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->video_id . '" class="change-p-status text-success" data-status="0" data-table="videos" data-key-id="video_id" data-id="' . $value->video_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
						<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Article img"></td>
                    	<td><span>' . $value->title . '</span></td>
                    	<td><span>' . substr(strip_tags($value->description), 0, 50) . '..</span></td>
                    	<td><span>' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->video_id.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="videos"" data-key-id="video_id" data-id="' . $value->video_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end videos

if (isset($other_categories)) {
	if (!empty($other_categories)) {
		foreach ($other_categories as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->genocide_categorie_id  . '" class="change-p-status text-danger" data-status="1" data-table="genocide_categories"" data-key-id="genocide_categorie_id" data-id="' . $value->genocide_categorie_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->genocide_categorie_id  . '" class="change-p-status text-success" data-status="0" data-table="genocide_categories"" data-key-id="genocide_categorie_id" data-id="' . $value->genocide_categorie_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
                    	<td><h5>' . $value->name . '</h5></td>
                    	<td><span class="text-muted">' . $value->title . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->genocide_categorie_id.'" data-name="'.$value->name.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="genocide_categories"" data-key-id="genocide_categorie_id" data-id="' . $value->genocide_categorie_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end other Category

if (isset($other_news)) {
	if (!empty($other_news)) {
		foreach ($other_news as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->genocide_news_id . '" class="change-p-status text-danger" data-status="1" data-table="genocide_news" data-key-id="genocide_news_id" data-id="' . $value->genocide_news_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->genocide_news_id . '" class="change-p-status text-success" data-status="0" data-table="genocide_news" data-key-id="genocide_news_id" data-id="' . $value->genocide_news_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Product img"></td>
                    	<td><h5>' . $value->cat_name . '</h5></td>
                    	<td><span class="text-muted">' . $value->news_title . '</span></td>
                    	<td><span class="col-green">' . $value->state_name . '</span></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="'.base_url("admin/other/edit-news/".$value->genocide_news_id).'" class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                 <a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="genocide_news"" data-key-id="genocide_news_id" data-id="' . $value->genocide_news_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Attribute size

if (isset($news)) {
	if (!empty($news)) {
		foreach ($news as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->news_id . '" class="change-p-status text-danger" data-status="1" data-table="news" data-key-id="news_id" data-id="' . $value->news_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->news_id . '" class="change-p-status text-success" data-status="0" data-table="news" data-key-id="news_id" data-id="' . $value->news_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
						<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Article img"></td>
                    	<td><span>' . $value->title . '</span></td>
                    	<td><span>' . substr(strip_tags($value->description), 0, 50) . '..</span></td>
                    	<td><span>' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->news_id.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="news"" data-key-id="news_id" data-id="' . $value->news_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end articles

if (isset($subscribe_list)) {
	if (!empty($subscribe_list)) {
		foreach ($subscribe_list as $key => $value) {
			$html .= '<tr>
                    	<td>'. ($key+1) .'</td>
                    	<td><h5>' . $value->email . '</h5></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created)) . '</span></td>
						<td>
						    <a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="subscribe_list"" data-key-id="id" data-id="' . $value->id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="4" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Subscriber

if (isset($gallery_categories)) {
	if (!empty($gallery_categories)) {
		foreach ($gallery_categories as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->gallery_category_id  . '" class="change-p-status text-danger" data-status="1" data-table="gallery_categories"" data-key-id="gallery_category_id" data-id="' . $value->gallery_category_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->gallery_category_id  . '" class="change-p-status text-success" data-status="0" data-table="gallery_categories"" data-key-id="gallery_category_id" data-id="' . $value->gallery_category_id . '">Active</a>';
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
                    	<td><h5>' . $value->name . '</h5></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->gallery_category_id.'" data-name="'.$value->name.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="gallery_categories"" data-key-id="gallery_category_id" data-id="' . $value->gallery_category_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="4" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end gallery category

if (isset($galleries)) {
	if (!empty($galleries)) {
		foreach ($galleries as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->gallery_id . '" class="change-p-status text-danger" data-status="1" data-table="gallery_master" data-key-id="gallery_id" data-id="' . $value->gallery_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->gallery_id . '" class="change-p-status text-success" data-status="0" data-table="gallery_master" data-key-id="gallery_id" data-id="' . $value->gallery_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->thumb_image) .'" alt="Product img"></td>
                    	<td><h5>' . $value->cat_name . '</h5></td>
                    	<td><span class="col-green">' . $value->name . '</span></td>
                    	<td><span class="col-info">' . date('d-m-Y', strtotime($value->created_at)) . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="'.base_url("admin/gallery/edit-gallery/".$value->gallery_id).'" class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="gallery_master"" data-key-id="gallery_id" data-id="' . $value->gallery_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="6" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Galleries

if (isset($states)) {
	if (!empty($states)) {
		foreach ($states as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->state_id . '" class="change-p-status text-danger" data-status="1" data-table="states" data-key-id="state_id" data-id="' . $value->state_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->state_id . '" class="change-p-status text-success" data-status="0" data-table="states" data-key-id="state_id" data-id="' . $value->state_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td>'. ($key+1) .'</td>
                    	<td><h5>' . $value->state_name . '</h5></td>
                    	<td><span class="col-green">' . $value->tooltip . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a href="javascript:void(0)" data-id="'.$value->state_id.'" data-tip="'.$value->tooltip.'"  class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category"><i class="zmdi zmdi-edit"></i></a>
                        </td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end states

if (isset($cms)) {
	if (!empty($cms)) {
		foreach ($cms as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->cms_id  . '" class="change-p-status text-danger" data-status="1" data-table="cms"" data-key-id="cms_id" data-id="' . $value->cms_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->cms_id  . '" class="change-p-status text-success" data-status="0" data-table="cms"" data-key-id="cms_id" data-id="' . $value->cms_id . '">Active</a>';
			}
			$html .= '<tr>
                    	<td><h5>' . $value->page . '</h5></td>
                    	<td><img src="'. base_url('uploads/thumbnail/'.$value->image) .'" alt="Product img"></td>
                    	<td><span class="text-muted">' . $value->title . '</span></td>
                    	<td><span class="text-muted">' . $value->description . '</span></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->cms_id.'" data-name="'.$value->description.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="5" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end CMS














if (isset($products)) {
	if (!empty($products)) {
		foreach ($products as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->product_id . '" class="change-p-status text-danger" data-status="1" data-table="products" data-key-id="product_id" data-id="' . $value->product_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->product_id . '" class="change-p-status text-success" data-status="0" data-table="products" data-key-id="product_id" data-id="' . $value->product_id . '">Active</a>';
			}
			if($value->product_image ==""){
				$value->product_image = base_url('uploads/no_image.png');
			}
			$html .= '<tr>
                    	<td><span>' . $value->product_name . '<p>'.$value->product_suk_id.'</p></span></td>
                    	<td>' . $value->size . '</td>
						<td>$'.round($value->price, 2).'</td>
						<td><img class="cat_img_table" src="' . $value->product_image . '" alt="cat1"/></td>
						<td>' . substr($value->description,0, 50) . '..</td>
                    	<td>' . $status . '</td>
						<td>
							<a class="btn btn-default waves-effect waves-float btn-sm waves-green edit-category" data-id="'.$value->nrc_categorie_id.'" data-name="'.$value->name.'" data-title="'.$value->title.'" href="javascript:void(0)"><i class="zmdi zmdi-edit"></i></a>
                    		<a href="javascript:void(0)" class="btn btn-default waves-effect waves-float btn-sm waves-red change-p-status" data-status="3" data-f="del" data-table="nrc_categories"" data-key-id="nrc_categorie_id" data-id="' . $value->nrc_categorie_id . '"><i class="zmdi zmdi-delete"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Produces
if (isset($cms_data)) {
	if (!empty($cms_data)) {
		foreach ($cms_data as $key => $value) {
			if ($value->status == 0) {
				$status = '<a href="javascript:void(0)" id="' . $value->cms_id . '" class="change-p-status text-danger" data-status="1" data-table="cms" data-key-id="cms_id" data-id="' . $value->cms_id . '">Inactive</a>';
			} else if ($value->status == 1) {
				$status = '<a href="javascript:void(0)" id="' . $value->cms_id . '" class="change-p-status text-success" data-status="0" data-table="cms" data-key-id="cms_id" data-id="' . $value->cms_id . '">Active</a>';
			}
			if(!empty($value->image)){
				$img = base_url('uploads/cms/'.$value->image);
			}else{
				$img = base_url('uploads/no_image.png');
			}
			$html .= '<tr>
						<td>' . ($key+1) . '</td>
						<td>' . $value->page . '</td>
                    	<td>' . $value->title . '</td>
                    	<td>' . substr($value->description, 0, 100) . '</td>
                    	<td> <img src="'.$img . '" width="100px"></td>
                    	<td>' . $status . '</td>
						<td>
							<a class="edit_class" href="'.base_url("admin/cms/edit/".$value->cms_id).'"><img src="'.base_url("public/admin/").'img/pinkedit.png" alt="pinkedit"/></a>
                    		<a href="javascript:void(0)" class="btn btn-gray change-p-status" data-status="3" data-f="del" data-table="cms" data-key-id="cms_id" data-id="' . $value->cms_id . '"><i class="fa fa-trash"></i></a>
                    	</td>
                    </tr>';
		}
	}else{
		$html .='<tr>
				<td colspan="7" align="center">
					No data found
				</td>
			</tr>';
	}
	echo $html;
} //end Charge
