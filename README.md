# BE Automatic Alt Text

Automatically adds alt text to images in Gutenberg block editor when you add the alt text in the Media Library

### Description
When you insert an image into a post, the HTML is “hardcoded” into the post content. You can edit the image’s alt text in the Media Library, but this will only include the alt text for future uses of the image. It won’t automatically update all of the past uses of that image in your older posts.

The code below fixes this. When a page loads, it finds all of the images that are missing alt text and looks to see if you’ve specified an alt text for it in the Media Library. If so, it updates the image before loading the page.

You can now go to your Media Library and update the alt text for every image. You won’t have to edit every post and update each instance of the image.

Note: this will only work for posts that are using the Gutenberg block editor. Even if you’re using the block editor now, it’s likely that most of your older content is still using the classic editor.

You can use [Bulk Block Converter](https://wordpress.org/plugins/bulk-block-converter/) to convert all the posts using the Classic editor to the Block editor, but be careful. I’d run the tool first on a staging environment and go through your posts to make sure there were no issues with the conversion.
