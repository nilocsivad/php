#!/bin/bash

source_path=$PWD
length=${#source_path}

echo "input the dest path(don't include '/'):"
read dest_path
echo "you input: ["${dest_path}"]  --> source folder:["${source_path}"]"

function loop_folder() {
	for file in `ls $1/`
	do
		path=$1"/"$file
		if test -f $path 
		then
			ln -s $path $dest_path${path:$length}
		else
			mkdir ${dest_path}${path:$length}
			loop_folder $path
		fi
	done
}

loop_folder $source_path

