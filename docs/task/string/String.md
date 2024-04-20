# Strivex\Phing\Task\String

## How to use the Strings tasks?
1. __Make sure Strivex\Phing is installed__
   ```php
   $ composer require strivexnl/strivex-phing 
   ```
   
2. __Load the autoloader in your build.xml__
   ```xml
   <property name="vendor.dir" value="${base.dir}/vendor" />
   <includepath classpath="$(vendor.dir}/autoload.php" />
   ```  
3. __Define the custom tasks you want to use__
   ```xml
   <!-- Define the tolowercase task -->
   <taskdef name="lowercase" classname="Strivex\Phing\Task\String\ToLowerCaseTask" />
   
   <!-- Define the stringcase task -->
   <taskdef name="stringcase" classname="Strivex\Phing\Task\String\StringCaseTask" />
   ```

4. __Use the custom tasks in your target__
   ```xml
   <target name="test">
      <!-- Define some text property -->
      <property name="some.text.one" value="Some Big Words" />
      <property name="some.text.two" value="Some Big Words" />
   
      <!-- Use the lowercase task to get the converted text in a property -->
      <tolowercase input="${some.text.one}" propertyName="some.text.one.lowercase" />
      <echo msg="Result: ${some.text.one.lowercase}" />
   
   
      <!-- Want multiple cases for one property? -->
      <stringcase input="${some.text.two}" propertyName="some.text.two">
         <!-- When there is no propertyName, the one from stringcase will be suffixed by the task name -->
         <lowercase />
         <uppercase />
         <!-- When there is a propertyName, that will be used (unchanged) also. You have two properties!
         <pascalcase propertyName="some.other.prop" -->
      </stringcase>
   
      <echo msg="${some.text.two.lowercase}" />
      <echo msg="${some.text.two.uppercase}" />
      <echo msg="${some.other.prop}" />
   </target>
   ```

## Available Custom String Tasks
As seen in the examples above, we define the task names like `lowercase`, `uppercase`. 
In all our examples we will use these task names. See the table below.

| Task (1)                        | Class (2)        | Input             | Result                      |
|---------------------------------|------------------|-------------------|-----------------------------| 
| [lowercase](#tolowercasetask)   | ToLowerCaseTask  | This is some text |`this is some text`     |
| [uppercase](#touppercasetask)   | ToUpperCaseTask  | This is some text |`THIS IS SOME TEXT`     |
| [pascalcase](#topascalcasetask) | ToPascalCaseTask | This is some text |`ThisIsSomeText`        |
| [camelcase](#tocamelcasetask)   | ToCamelCaseTask  | This is some text |`thisIsSomeText`        |
| [snakecase](#tosnakecasetask)   | ToSnakeCaseTask  | This is some text |`this_is_some_text`     |
| [kebabcase](#tokebabcasetask)   | ToKebabCaseTask  | This is some text |`this-is-some-text`     |
| [stringcase](#stringcasetask)   | ToStringCaseTask | This is some text | Depending in the used cases |

1. _We assume these task definitions names._
2. _All case tasks are in the `Strivex\Phing\Task\String` namespace._

### ToLowerCaseTask
The ToLowerCaseTask function will simply convert the input to a `lowercase` string.

| Name         | Type   | Description                      | Default | Required |
|--------------|--------|----------------------------------|:--------|:--------:|
| input        | String | The text to use                  | n/a     |   yes    |
| propertyName | String | The name of the property to set. | n/a     |   yes    |

Example:
```xml
<!-- Some text => some text -->
<lowercase input="${some.text}" propertyName="some.text.lowercase" />
```

### ToUpperCaseTask
The ToLowerCaseTask function will simply convert the input to an`UPPERCASE` string.

| Name         | Type   | Description                      | Default | Required |
|--------------|--------|----------------------------------|:--------|:--------:|
| input        | String | The text to use                  | n/a     |   yes    |
| propertyName | String | The name of the property to set. | n/a     |   yes    |

Example:
```xml
<!-- Some Text => SOME TEXT -->
<uppercase input="${some.text}" propertyName="some.text.uppercase" />
```

### ToPascalCaseTask
The ToPascalCaseTask function will convert the input to a`PascalCased` string.

| Name         | Type    | Description                      | Default | Required |
|--------------|---------|----------------------------------|:--------|:--------:|
| input        | String  | The text to use                  | n/a     |   yes    |
| propertyName | String  | The name of the property to set. | n/a     |   yes    |
| leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
| delimiter    | String  | Delimiter used in leaveSlashes   | "/"     |    no    |
_When using leaveSlashes the`PascalCase` will be used on all parts individually!_

Example:
```xml
<!-- some/directory/structure => SomeDirectoryStructure -->
<pascalcase input="${some.text}" propertyName="some.text.pascalcase" />

<!-- some/directory-bla-foo/structure => Some/DirectoryBlaFoo/Structure -->
<pascalcase input="${some.text}" propertyName="some.text.pascalcase" leaveSlashes="true" delimiter="/" />
```

### ToCamelCaseTask
The ToCamelCaseTask function will convert the input to a`camelCased` string.

| Name         | Type    | Description                      | Default | Required |
|--------------|---------|----------------------------------|:--------|:--------:|
| input        | String  | The text to use                  | n/a     |   yes    |
| propertyName | String  | The name of the property to set. | n/a     |   yes    |
| leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
| delimiter    | String  | Delimiter used in leaveSlashes   | "/"     |    no    |
_When using leaveSlashes the`camelCase` will be used on all parts individually!_

Example:
```xml
<!-- some/directory/structure => someDirectoryStructure -->
<camelcase input="${some.text}" propertyName="some.text.camelcase" />

<!-- some/directory-bla-foo/structure => some/directoryBlaFoo/structure -->
<camelcase input="${some.text}" propertyName="some.text.camelcase" leaveSlashes="true" delimiter="/" />
```

### ToSnakeCaseTask
The ToSnakeCaseTask function will convert the input to a`snake_cased` string.

| Name         | Type    | Description                      | Default | Required |
|--------------|---------|----------------------------------|:--------|:--------:|
| input        | String  | The text to use                  | n/a     |   yes    |
| propertyName | String  | The name of the property to set. | n/a     |   yes    |
| leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
| delimiter    | String  | Delimiter used in leaveSlashes   | "/"     |    no    |
_When using leaveSlashes the`snake-case` will be used on all parts individually!_

Example:
```xml
<!-- some/directory/structure => some_directorys_tructure -->
<snakecase input="${some.text}" propertyName="some.text.snakecase" />

<!-- some/directoryBla/structure => some/directory_bla/structure -->
<snakecase input="${some.text}" propertyName="some.text.snakecase" leaveSlashes="true" delimiter="/" />
```

### ToKebabCaseTask
The ToKebabCase function will convert the input to a`kebab-cased` string.

| Name         | Type    | Description                      | Default | Required |
|--------------|---------|----------------------------------|:--------|:--------:|
| input        | String  | The text to use                  | n/a     |   yes    |
| propertyName | String  | The name of the property to set. | n/a     |   yes    |
| leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
| delimiter    | String  | Delimiter used in leaveSlashes   | "/"     |    no    |
_When using leaveSlashes the`kebab-case` will be used on all parts individually!_

Example:
```xml
<!-- some/directory/structure => some-directory-structure -->
<kebabcase input="${some.text}" propertyName="some.text.kebabcase" />

<!-- some/directoryBla/structure => some/directory-bla-foo/structure -->
<kebabcase input="${some.text}" propertyName="some.text.kebabcase" leaveSlashes="true" delimiter="/" />
```

### StringCaseTask
The StringCaseTask can convert the input to multiple properties (extended with the case) in subs.
As an extra you can give each case another seperate propertyName.

| Name         | Type   | Description                     | Default | Required |
|--------------|--------|---------------------------------|---------|:--------:|
| input        | String | Text to use                     | n/a     |   yes    |
| propertyName | String | The name of the property to set | n/a     |    no    |
_If you use the propertyName will be suffixed by the case name, like .lowercase or .uppercase_

The allowed nested tags:

| Name       | Attributes   | Type    | Description                      | Default | Required |
|------------|--------------|---------|----------------------------------|---------|:--------:| 
| lowercase  | propertyName | String  | Extra property to set            | n/a     |    no    | 
| uppercase  | propertyName | String  | Extra property to set            | n/a     |    no    |
| pascalcase | propertyName | String  | Extra property to set            | n/a     |    no    |
|            | leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
|            | delimiter    | String  | Delimiter used in _leaveSlashes_ | "/"     |    no    |
| camelcase  | propertyName | String  | Extra property to set            | n/a     |    no    |
|            | leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
|            | delimiter    | String  | Delimiter used in _leaveSlashes_ | "/"     |    no    |
| snakecase  | propertyName | String  | Extra property to set            | n/a     |    no    |
|            | leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
|            | delimiter    | String  | Delimiter used in _leaveSlashes_ | "/"     |    no    |
| kebabcase  | propertyName | String  | Extra property to set            | n/a     |    no    |
|            | leaveSlashes | Boolean | Leave slashes untouched          | false   |    no    |
|            | delimiter    | String  | Delimiter used in _leaveSlashes_ | "/"     |    no    |
_If you do not want to automate the property suffix assignment from the`stringcase` task,
you can use the _propertyName_ on the nested tags itself_

Examples:
```xml
<!-- We assume that you defined the StringCaseTask as stringcase -->
<stringcase input="This is some text" propertyName="some.property">
   <lowercase />
   <uppercase propertyName="another.extra.property" />
   <pascalcase leaveSlashes="true" delimiter="/" />
</stringcase>

<!-- 
    This will result in the following properties:
    some.property               (= "This is some text")
    some.property.lowercase     (= "this is some text")
    some.property.uppercase     (= "THIS IS SOME TEXT")
    some.property.pascascase    (= "ThisIsSomeText")
    another.extra.property      (= "THIS IS SOME TEXT")
 -->

<!-- Ommit the propertyName on stringcase -->
<stringcase input="Module Name">
    <lowercase propertyName="result.text.smallchars" />
    <uppercase propertyName="result.text.bigchars" />
</stringcase>

<!--
    This wil resul in the following properties:
    - result.text.smallchars
    - result.text.bigchars
 -->

```







