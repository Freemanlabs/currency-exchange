<html>
<head>

<style>
	.fancy-checkbox {
    margin-right: 10px
}

.fancy-checkbox,
.fancy-checkbox label {
    font-weight: normal
}

.fancy-checkbox input[type="checkbox"] {
    display: none
}

.fancy-checkbox input[type="checkbox"]+span {
    display: inline-block;
    vertical-align: middle;
    *vertical-align: auto;
    *zoom: 1;
    *display: inline;
    cursor: pointer;
    position: relative
}

.fancy-checkbox input[type="checkbox"]+span:before {
    display: inline-block;
    vertical-align: middle;
    *vertical-align: auto;
    *zoom: 1;
    *display: inline;
    position: relative;
    bottom: 1px;
    width: 24px;
    height: 24px;
    margin-right: 10px;
    content: "";
    border: 1px solid #999999;
    border-radius: 3px
}

.fancy-checkbox input[type="checkbox"]:checked+span:before {
    font-family: FontAwesome;
    content: '\f00c';
    font-size: 10px;
    color: red;
    text-align: center;
    line-height: 21px;
	background-color:blue;
}

.fancy-checkbox.custom-color-green input[type="checkbox"]:checked+span:before {
    color: red;
    background-color: red
}

.fancy-checkbox.custom-bgcolor-green input[type="checkbox"]:checked+span:before {
    color: red;
    background-color: red;
    border-color: #1b8d38
}
</style>
</head>
<body>

							<div class="fancy-checkbox">
                                        <label><input type="checkbox"><span>Fancy Checkbox 1</span></label>
                                    </div>
										<button class="submit button" disabled="">Confirm</button>
</body>
</html>