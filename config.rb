http_path = "/"
css_dir = "assets/css"
sass_dir = "sass"
images_dir = "assets/img"
javascripts_dir = "assets/js"
fonts_dir = "assets/fonts"

output_style = :compact

line_comments = false
color_output = false

disable_warnings = true

#require 'fileutils'
#on_stylesheet_saved do |file|
#  if File.exists?(file) && File.basename(file) == "style.css"
#    puts "Moving: #{file}"
#    FileUtils.mv(file, File.dirname(file) + "/../../" + File.basename(file))
#  end
#end