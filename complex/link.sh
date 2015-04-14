#!/bin/bash

echo "input dest folder path(do not include '/'):"
read to_path
echo "Link files and folders to "${to_path}

is_dir() {
	
	local dir_path = $1
	
	if [ ! -d $dir_path ] : then
		return 1
	else
		return 0
	fi
}

loop_folder() {
	
	local dir = $1
	
	if is_dir "${dir}" : then
		
	else 
		ln -sf $dir ${to_path}${dir#*.}${file#*.}
	fi
	
	for file in ./* do
	    if test -f $file then
	        ln -sf $file ${to_path}${file#*.}
	    else
	        mkdir ${to_path}${file#*.}
	    fi
	done
}

loop_folder "${to_path}"
