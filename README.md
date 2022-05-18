# Mo Person Block

  

## Usage

The plugin can be separated into two parts

Part one: a custom post type that allows you to add person data (in this case) such as:

First/Last name

Description

Image of person

Position in the company (such as CEO, Project Manager, Developer)

Social Network Links

○ GitHub,

○ LinkedIn,

○ Xing,

○ Facebook

Part Two: a gutenberg block, we use the data we add in the part one to display it in our custom block, the block is very simple you just select the person you want to show whether in columns or standalone block and this will retrieve the data from the person custom post type.

  

## Implementation

Mo Person Block was developed to allow the user to add his/her data dynamically (real case scenario for a company) which then can be used anywhere where Gutenberg is working.

Using this block (Mo Person Block), to add these fields I opted to create custom fields using Carbon Fields to fill the data which are of different types (Text, Media [image], URLs). Installed through composer package manager.

  
In the frontend there is a script [(pluginUrl)/assets/moPesron.js] created to do the modal logic which opens the modal with box and overlay. The box should contain the info for the clicked [**targeted**] person.